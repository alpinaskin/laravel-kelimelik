<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AnasayfaController extends Controller
{
    public function index(){
        if(Auth::check()){
            $ogrenilen_kelime_sayisi = Auth::user()->ogrenilecekKelimeler()->where('ogrenildi','=','1')->count();
            return view('pages.anasayfa')->withOgrenilen($ogrenilen_kelime_sayisi);    
        }else{
            return redirect()->route('login');
        }
        
    }
}
