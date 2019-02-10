<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\TipoInfo;

class TipoInfoDetalle extends Model
{
    protected $table='tipo_info_detalle';

    public function tipoInfo(){
        //primero la clase  a relacionar                    ('TipoInfo::class')
        //segungo llave foranea de la tabla a relacionar    ('tipo_info_id')
        //tercero llave principal de la tabla               ('id')
        //return $this->belongsTo('App\Post', 'foreign_key', 'other_key');  de muchos a uno
       return $this->belongsTo(TipoInfo::class,'tipo_info_id','id');
    }
    public function solicitud(){
        //Primero va la clase a relacionar (PerfilCliente)
       //Segundo el nombre de la tabla pivot )perfil_cliente_tipo_producto)
       //La clave foranea de la Clase Principal (TipoProducto)
       // la clave foranea de la clase a relacionar (PerfilCliente= ..(perfil_cliente_id)
       return $this->belongsToMany('App\Http\Models\Solicitud','solicitud_detalle','tipo_info_detalle_id','solicitud_id')
       ->withPivot('monto');

   }
}
