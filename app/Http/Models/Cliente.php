<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='cliente';
    protected $attributes = ['full_name'];
    protected $appends = ['full_name'];
    
    protected $fillable= [
        "dni","nombres","apellido_paterno","apellido_materno","fecha_nacimiento","activo","created_at","updated_at","direccion","telefono"
    ];

    public function solicitud(){
        return $this->belongsToMany('App\Http\Models\Solicitud','avales','cliente_id','solicitud_id')->withPivot('tipo');
    }

    public function getFullNameAttribute()
    {
        return strtoupper($this->nombres.' '.$this->apellido_paterno.' '.$this->apellido_materno);
    }
}
