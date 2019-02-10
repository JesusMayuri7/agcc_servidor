<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Solicitud;
class GiroNegocio extends Model
{
    protected $table='giro_negocio';

    protected $fillable= [
        "desc_giro_negocio","margen_minimo","margen_maximo","activo"
    ];
    public function solicitud(){
        return $this->hasMany(Solicitud::class,'giro_negocio_id','id');
    }
}
