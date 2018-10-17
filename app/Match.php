<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = [

    ];
    public function sets () {
        return $this->hasMany('App\Sets');
    }

    protected function create()
    {

    }

    protected $table = 'matches';
}
