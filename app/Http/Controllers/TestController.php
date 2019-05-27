<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelime;
use App\User;
use App\Soru;
use App\Cevap;
use App\Test;
use DB;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $testler = Auth::user()->test()->paginate(20);
        return view('pages.test.show')->withTestler($testler);
    }

    public function testOlustur(){
        // Test oluşturuldu
        $test = Auth::user()->test()->create();
        
        // Random öğrenilecek kelime
        $kelimeler = Auth::user()->ogrenilecekKelimeler()->inRandomOrder()->take(2)->get();
        
        // yeni soru oluşturuldu

        foreach($kelimeler as $kelime){
            $yanlis_cevaplar = Kelime::inRandomOrder()->where('kelime_adi', '!=', $kelime->kelime_adi)->take(3)->get('kelime_adi')->toArray();
            
            $data = [
                'dogru_cevap' => $kelime->kelime_adi,
                'yanlis1_cevap' => reset($yanlis_cevaplar[0]),
                'yanlis2_cevap' => reset($yanlis_cevaplar[1]),
                'yanlis3_cevap' => reset($yanlis_cevaplar[2])                 
            ];
            
            // Cevap oluştur
            $cevap = Cevap::create($data);
            
            // Soru oluştur
            $soru = new Soru();
            $soru->kelime_id = $kelime->id;
            $soru->test_id = $test->id;
            $soru->cevaplar_id = $cevap->id;
            $soru->soru_tip_id = 1;

            $soru->save();
        }

        return redirect('/test');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        // Test oluşturuldu
        $test = Auth::user()->test()->create();
        
        // Random öğrenilecek kelime
        $kelimeler = Auth::user()->ogrenilecekKelimeler()->inRandomOrder()->take(20)->get();
        
        // yeni soru oluşturuldu

        foreach($kelimeler as $kelime){
            $yanlis_cevaplar = Kelime::inRandomOrder()->where('kelime_adi', '!=', $kelime->kelime_adi)->take(3)->get('kelime_adi')->toArray();
            
            $data = [
                'dogru_cevap' => $kelime->kelime_adi,
                'yanlis1_cevap' => reset($yanlis_cevaplar[0]),
                'yanlis2_cevap' => reset($yanlis_cevaplar[1]),
                'yanlis3_cevap' => reset($yanlis_cevaplar[2])                 
            ];
            
            // Cevap oluştur
            $cevap = Cevap::create($data);
            
            // Soru oluştur
            $soru = new Soru();
            $soru->kelime_id = $kelime->id;
            $soru->test_id = $test->id;
            $soru->cevaplar_id = $cevap->id;
            $soru->soru_tip_id = 1;

            // Eğer kelime zaten öğrenilmediyse kaydet
            $ogrenildi = DB::table('ogrenilecek_kelimeler')->where('kelime_id','=', $soru->kelime()->first()->id)->get();
            if(!$ogrenildi->first()->ogrenildi){
                $soru->save();
                $cevap->soru_id = $soru->id;
                $cevap->save();
            }
        }
        return view('pages.test.index')->withTest($test);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $i=0;
        $dogru = 0;
        // test id testi bul
            $test = Test::find($request->test_id);
        // testin sorularını getir
            $sorular = $test->soru()->get()->all();

        // request cevapları eşle
        foreach($sorular as $soru){
            $i++;
            // DB verilen cevap db'ye kaydet
            DB::table('verilen_cevaplar')->insert([
                'cevap' => $request[$i],
                'soru_id' => $soru->id
            ]);
            // cevapla kıyasla
            if($soru->cevap()->first()->dogru_cevap == $request[$i]){
                // doğru ise
                $dogru++;
                $ogrenilecek_kelime = DB::table('ogrenilecek_kelimeler')->where('kelime_id', '=',$soru->kelime->id)->get();
                
                if(($ogrenilecek_kelime->first()->tarih_ucuncu != null)) {
                    
                    $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $ogrenilecek_kelime->first()->tarih_ucuncu);
                    $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', now());
                    $diff_in_days = $to->diffInDays($from);
                    
                    if($diff_in_days >= 30 ){
                        DB::table('ogrenilecek_kelimeler')->where('kelime_id','=', $soru->kelime()->first()->id)->update([
                            'ogrenildi' => true
                        ]);
                    }
                }else if(($ogrenilecek_kelime->first()->tarih_ikinci != null)){
                    
                    $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $ogrenilecek_kelime->first()->tarih_ikinci);
                    $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', now());
                    $diff_in_days = $to->diffInDays($from);
                    
                    if($diff_in_days >= 7 ){
                        DB::table('ogrenilecek_kelimeler')->where('kelime_id','=', $soru->kelime()->first()->id)->update([
                            'tarih_ucuncu' => now()
                        ]);
                    }
                    
                }else if(($ogrenilecek_kelime->first()->tarih_ilk != null)){
                    
                    $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $ogrenilecek_kelime->first()->tarih_ilk);
                    $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', now());
                    $diff_in_days = $to->diffInDays($from);
                    
                    if($diff_in_days >= 1 ){
                        DB::table('ogrenilecek_kelimeler')->where('kelime_id','=', $soru->kelime()->first()->id)->update([
                            'tarih_ikinci' => now()
                        ]);     
                    }
                }else{
                    DB::table('ogrenilecek_kelimeler')->where('kelime_id','=', $soru->kelime()->first()->id)->update([
                        'tarih_ilk' => now()
                    ]);
                }
            }else{
                DB::table('ogrenilecek_kelimeler')->where('kelime_id','=', $soru->kelime()->first()->id)->update([
                    'tarih_ilk' => null,
                    'tarih_ikinci' => null,
                    'tarih_ucuncu' => null
                ]);
            }
        }

        // testteki doğru sayısını güncelle
        DB::table('testler')->where('id', '=', $test->id)->update([
            'dogru_sayisi' => $dogru
        ]);

        // view döndür

        return $this->show($test->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Test bul
        $test = Test::find($id);
        $sorular = $test->soru()->get()->all();
        $verilen_cevaplar = array();
    
        foreach($sorular as $soru){
            $cevap = DB::table('verilen_cevaplar')->where('soru_id','=',$soru->id)->get();
            array_push($verilen_cevaplar,$cevap->first()->cevap);
        }
        return view('pages.test.result')->withSorular($sorular)->withCevaplar($verilen_cevaplar);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
