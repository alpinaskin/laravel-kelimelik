<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelime;
use App\User;
use App\Soru;
use App\Cevap;
use App\Test;
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
    {   
        return view('pages.test.show');
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
            $cevap->soru_id = $soru->id;
            $cevap->save();
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
        $dogru = 0;
        $yanlis = 0;
        // test id testi bul
            $test = Test::find($request->test_id);
        // testin sorularını getir
            $sorular = $test->soru()->get()->all();

        // request cevapları eşle
        foreach($sorular as $soru){

            // cevapla kıyasla

        }

        // ..
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
