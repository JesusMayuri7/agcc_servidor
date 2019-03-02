<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Solicitud;
use App\Http\Models\Auditoria;
use App\Http\Models\Rol;
class Empleado extends Model
{
    protected $table ='empleado';

    protected $fillable= [
        "dni","nombres","apellido_paterno","apellido_materno","usuario","password","email","activo","created_at","updated_at"];
    public function solicitud(){
        return $this->hasMany(Solicitud::class,'empleado_id','id');

     //primero la clase a relacionar
    //segundo la llave foranea de la tabla relacionar
    //tercero la llave de tabla a relacionar
   //return $this->hasMany('App\Comment', 'foreign_key', 'local_key');uno a muchos
    

    }
    public function rol(){
        //Primero va la clase a relacionar (PerfilCliente)
       //Segundo el nombre de la tabla pivot )perfil_cliente_tipo_producto)
       //La clave foranea de la Clase Principal (TipoProducto)
       // la clave foranea de la clase a relacionar (PerfilCliente= ..(perfil_cliente_id)
       return $this->belongsToMany(Rol::class,'empleado_rol','empleado_id','rol_id')
       ->withPivot('desc_rol');
}
        public function auditoria(){
        return $this->hasMany(Auditoria::class,'empleado_id','id');

         //primero la clase a relacionar
            //segundo la llave foranea de la tabla relacionar
                //tercero la llave de tabla a relacionar
                    //return $this->hasMany('App\Comment', 'foreign_key', 'local_key');uno a muchos
                }
}
