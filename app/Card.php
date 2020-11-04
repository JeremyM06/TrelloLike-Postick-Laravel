<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public function coms()
    {
        return $this->hasMany('App\Com');
    }
}
