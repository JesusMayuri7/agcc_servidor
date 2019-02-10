<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Solicitud;
class Ahorro extends Model
{
    protected $table='ahorro';
    protected $fillable=[
        "desc_ahorro","porcentaje"
    ];
    public function solicitud(){
        //Primero va la clase a relacionar (PerfilCliente)
       //Segundo el nombre de la tabla pivot )perfil_cliente_tipo_producto)
       //La clave foranea de la Clase Principal (TipoProducto)
       // la clave foranea de la clase a relacionar (PerfilCliente= ..(perfil_cliente_id)
       return $this->belongsToMany(Solicitud::class,'solicitud_ahorro','ahorro_id','solicitud_id')
       ->withPivot('monto');
}
    
}
