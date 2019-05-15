<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelime;

class KelimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.kelime.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.kelime.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $kelime = Kelime::find($id);
        return view('pages.kelime.edit')->withKelime($kelime);
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
        //
    }
}
