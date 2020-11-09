<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;


class Col extends Model
{
    use CascadesDeletes;

    protected $cascadeDeletes = ['cards'];


    public function cards()
    {
        return $this->hasMany('App\Card');
    }
}
