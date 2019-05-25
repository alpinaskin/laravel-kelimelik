<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soru extends Model
{
    protected $table = 'sorular';
    protected $fillable = ['test_id', 'kelime_id', 'soru_tip_id', 'cevaplar_id'];
    public $timestamps = false;
    public function test(){
        return $this->belongsTo('App\Test');
    }

    public function kelime(){
        return $this->belongsTo('App\Kelime');
    }

    public function cevap(){
        return $this->hasMany('App\Cevap');
    }
}
