<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelime;
use Illuminate\Support\Facades\Auth;
use DB;

class KelimeController extends Controller
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
        $kelimeler = Kelime::paginate(10);
        
        return view('pages.kelime.index')->withKelimeler($kelimeler);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        if(Auth::user()->isAdmin)
            return view('pages.kelime.create');
        return redirect('kelime');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->isAdmin){
            $request->validate([
                'kelime' => 'required|min:2|max:25',
                'anlam' => 'required|min:2|max:25',
                'cumle' => 'required|min:5|max:100',
                'kelime_tur' => 'required'
            ]);
            $kelime = new Kelime();
            $kelime->kelime_adi = $request->get('kelime');
            $kelime->anlami = $request->get('anlam');
            $kelime->cumle = $request->get('cumle');
            $kelime->tur_id = $request->get('kelime_tur');
            $kelime->save();
        }
        return redirect('/kelime');
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
        if(Auth::user()->isAdmin){
            $kelime = Kelime::find($id);
            return view('pages.kelime.edit')->withKelime($kelime);
        }else{
            return redirect('kelime');
        }
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
        if(Auth::user()->isAdmin){
            $kelime = Kelime::find($id);

            $request->validate([
                'kelime' => 'required|min:2|max:25',
                'anlam' => 'required|min:2|max:25',
                'cumle' => 'required|min:5|max:100',
                'kelime_tur' => 'required'
            ]);

            $kelime->kelime_adi = $request->get('kelime');
            $kelime->anlami = $request->get('anlam');
            $kelime->cumle = $request->get('cumle');
            $kelime->tur_id = $request->get('kelime_tur');
            $kelime->save();
        }
        
        return redirect('/kelime');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        if(Auth::user()->isAdmin){
            $kelime = Kelime::find($id);
            $kelime->delete();
        }
        return redirect('/kelime');
    }

    public function ara(Request $request){
        $request->validate([
            'search' => 'required|min:2|max:50'
        ]);
        $aranacak = $request->get('search');

        $kelimeler = 
        Kelime::query()
                ->where('kelime_adi', 'LIKE', '%' . $aranacak . '%')
                ->orWhere('anlami', 'LIKE', '%' . $aranacak . '%')
                ->paginate(5);
        
        return view('pages.kelime.index')->withKelimeler($kelimeler);
    }
    // Öğrenilecek Kelimeler ->
    public function ogrenilecekKelimeKaydet($id){
        $kelime = Kelime::find($id);
        $user = Auth::user();
        $user->ogrenilecekKelimeler()->syncWithoutDetaching($kelime);

        return redirect('kelime');
    }

    public function ogrenilecekKelimeCikar($id){
        $kelime = Kelime::find($id);
        $user = Auth::user();
        
        $user->ogrenilecekKelimeler()->detach($kelime);

        return redirect('kelime');
    }

    public function ogrenilecekKelimelerIndex(){
        $user = Auth::user();

        $kelimeler = $user->ogrenilecekKelimeler()->get();

        return view('pages.kelime.ogrenilecek.index')->withKelimeler($kelimeler);
    }
}
