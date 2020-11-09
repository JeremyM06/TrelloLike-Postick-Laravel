<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;


class Card extends Model
{
    use CascadesDeletes;

    protected $cascadeDeletes = ['coms'];

    public function coms()
    {
        return $this->hasMany('App\Com');
    }
}
