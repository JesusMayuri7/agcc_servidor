<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Resolucion extends Model
{
    protected $table='resolucion';
    protected $fillable= [
        "nro_resolucion","estado","solicitud_id"
    ];

    public function solicitud()
    {
        //return $this->belongsTo('App\User');
       // return $this->belongsTo('App\Http\Models\Solicitud');
       // return $this->morphOne('App\Http\Models\Solicitud','resolucion');

        //return $this->hasOne('App\Profile', 'clave_foranea', 'clave_local_a_relacionar');
        return $this->hasOne('App\http\Models\Solicitud','solicitud_id','id');
    }
}
