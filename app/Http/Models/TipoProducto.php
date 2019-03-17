<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    protected $table='tipo_producto';

    protected $fillable= [
        "desc_tipo_producto","interes","mora","plazo_minimo","plazo_maximo","activo"
    ];

    public function perfil_cliente()
    {
        //Primero va la clase a relacionar (PerfilCliente)
        //Segundo el nombre de la tabla pivot )perfil_cliente_tipo_producto)
        //La clave foranea de la Clase Principal (TipoProducto)
        // la clave foranea de la clase a relacionar (PerfilCliente= ..(perfil_cliente_id)
        return $this->belongsToMany('App\Http\Models\PerfilCliente','perfil_cliente_tipo_producto','tipo_producto_id','perfil_cliente_id')->withTimestamps();
    } 
}
