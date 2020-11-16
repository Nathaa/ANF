<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    //
    protected $fillable = [
'codigo','codigo_padre','nombre', 'descripcion','empresas_id', 'tipocuentas_id',

    ];

   

    public function empresas()
    {
        return $this->belongsTo('App\Empresa', 'empresas_id');
    }
    public function tipocuentas()
    {
        return $this->hasMany(Tipocuentas::class);
    }

    public function balance()
    {
        return $this->belongsTo(Balance::class);
    }

    public function resultado()
    {
        return $this->belongsTo(Resultado::class);
    }
}
