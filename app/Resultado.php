<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    //

    protected $fillable = [
        'nombre','monto','fecha_inicio','fecha_final','cuentas_id'
    
        ];

    public function cuentas()
    {
        return $this->hasMany(Cuentas::class);
    }

}
