<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelimeTuru extends Model
{
    protected $table = 'kelime_turu';
    protected $fillable = ['tur'];

    public function kelime(){
        return $this->hasOne('App\Kelime', 'tur_id');
    }

}
