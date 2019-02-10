<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='cliente';

    protected $fillable= [
        "dni","nombres","apellido_paterno","apellido_materno","fecha_nacimiento","activo","created_at","updated_at","direccion","telefono"
    ];

    public function solicitud_cliente(){
        return $this->belongsToMany('App\Http\Models\Solicitud','avales','cliente_id','solicitud_id')->withPivot('tipo');
    }
}
