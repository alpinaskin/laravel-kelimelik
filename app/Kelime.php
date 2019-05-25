<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelime extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kelime_adi', 'anlami', 'aciklama', 'kelime_turu',
    ];

    protected $table = 'kelime';

    public function kelime_turu(){
        return $this->belongsTo('App\KelimeTuru','tur_id');
    }

    public function ogrenilecekKelimeKullanicilar(){
        return $this->belongsToMany('App\User', 'ogrenilecek_kelimeler', 'kelime_id', 'user_id');
    }

    public function soru(){
        return $this->hasMany('App\Soru');
    }
    
}
