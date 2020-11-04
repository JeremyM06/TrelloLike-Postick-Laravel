<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    public function cols()
    {
        return $this->hasMany('App\Col');
    }
}
