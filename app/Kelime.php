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
}
