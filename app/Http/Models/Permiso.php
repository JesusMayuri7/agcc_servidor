<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Rol;
use App\Http\Models\Modulo;
class Permiso extends Model
{
    protected $table='permiso';
    protected $fillable = [
        "desc_permiso"
    ];

        public function rol(){
        //Primero va la clase a relacionar (PerfilCliente)
        //Segundo el nombre de la tabla pivot )perfil_cliente_tipo_producto)
       //La clave foranea de la Clase Principal (TipoProducto)
        // la clave foranea de la clase a relacionar (PerfilCliente= ..(perfil_cliente_id)
        return $this->belongsToMany(Rol::class,'rol_permiso','permiso_id','rol_id')
        ->withPivot('id');
       }
       public function modulo(){
        return $this->belongsToMany(Modulo::class,'permiso_modulo','permiso_id','modulo_id')
        ->withPivot('id');
       }
}
