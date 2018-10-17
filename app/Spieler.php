<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spieler extends Model
{
    protected $fillable = [
        'name',
    ];

   	protected $table = 'spieler';
}
