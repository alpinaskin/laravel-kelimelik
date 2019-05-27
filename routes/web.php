<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Get routes 

Route::get('/', function () {
    return view('pages.anasayfa');
})->name('anasayfa');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('kelime/ogrenilecekkelimeler', 'KelimeController@ogrenilecekKelimelerIndex');

// Post Routes

Route::get('kelime/ara', 'KelimeController@ara')->name('kelime.search');
Route::post('kelime/ogrkelimekayit/{id}', 'KelimeController@ogrenilecekKelimeKaydet')->name('kelime.ogrenilecekKelimeKaydet');
Route::post('kelime/ogrkelimecikar/{id}', 'KelimeController@ogrenilecekKelimeCikar')->name('kelime.ogrenilecekKelimeCikar');
// Route resources

Route::resource('kelime','KelimeController');
Route::resource('test', 'TestController');
Auth::routes();