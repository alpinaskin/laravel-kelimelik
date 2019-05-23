<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cevap extends Model
{
    protected $fillable = ['dogru_cevap', 'yanlis1_cevap', 'yanlis2_cevap', 'yanlis3_cevap'];
    protected $table = 'cevaplar';
    public $timestamps = false;
}
