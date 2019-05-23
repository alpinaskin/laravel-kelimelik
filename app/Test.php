<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'testler';
    protected $fillable = ['user_id'];
    public function sorular(){
        return $this->hasMany('App\Sorular','sorular_id', 'id');
    }
}
