<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipocuenta extends Model
{
    protected $fillable = [
        'nombre','descripcion','subtipo',

    ];
}
