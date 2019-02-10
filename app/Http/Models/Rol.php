<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Empleado;
use App\Http\Models\Permiso;
class Rol extends Model
{
    protected $table='rol';
    protected $fillable=[
        "desc_rol","detalle"
    ];
    public function empleado(){
        //Primero va la clase a relacionar (PerfilCliente)
       //Segundo el nombre de la tabla pivot )perfil_cliente_tipo_producto)
       //La clave foranea de la Clase Principal (TipoProducto)
       // la clave foranea de la clase a relacionar (PerfilCliente= ..(perfil_cliente_id)
       return $this->belongsToMany(Empleado::class,'empleado_rol','rol_id','empleado_id')
       ->withPivot('desc_rol');
    }

    public function permiso(){
     //Primero va la clase a relacionar (PerfilCliente)
     //Segundo el nombre de la tabla pivot )perfil_cliente_tipo_producto)
    //La clave foranea de la Clase Principal (TipoProducto)
     // la clave foranea de la clase a relacionar (PerfilCliente= ..(perfil_cliente_id)
     return $this->belongsToMany(Permiso::class,'rol_permiso','rol_id','permiso_id')
     ->withPivot('id');
    }
}
