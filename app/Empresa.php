<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Empresa extends Model
{
    protected $fillable = [
        'nombre', 'codigo','descripcion','rubro','user_id',
    ];

    protected  $table = 'empresas';

    public function user()
    {
    return $this->belongsTo(User::class);
    }

}
