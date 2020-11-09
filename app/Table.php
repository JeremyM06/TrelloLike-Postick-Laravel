<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;


class Table extends Model
{
    use CascadesDeletes;

    protected $cascadeDeletes = ['cols'];

    public function cols()
    {
        return $this->hasMany('App\Col');
    }
}
