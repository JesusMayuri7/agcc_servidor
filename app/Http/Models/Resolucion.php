<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Resolucion extends Model
{
    protected $table='resolucion';
    protected $primaryKey = 'id';

    protected $fillable= [
        "nro_resolucion","estado","solicitud_id","comentario","ahorro_inicial","ahorro_programado","tipo_interes","monto","interes","plazo","cuota"
    ];

    public function solicitud()
    {
        return $this->belongsTo('App\http\Models\Solicitud','solicitud_id','id');
    }

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->toDateTimeString();
    }

}
