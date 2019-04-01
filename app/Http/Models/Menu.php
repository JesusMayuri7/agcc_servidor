<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Permiso;

class Menu extends Model
{
    protected $table='menu';
    protected $fillable =[
        "desc_menu","formulario","tipo"
    ];
    protected $visible = ['desc_menu','formulario','permiso'];
    //primero la clase a relacionar
    //segundo la llave foranea de la tabla relacionar
    //tercero la llave de tabla a relacionar
   //return $this->hasMany('App\Comment', 'foreign_key', 'local_key');uno a muchos
   public function permiso()
   {
       return $this->hasMany(Permiso::class,'menu_id','id');
       //->selectRaw('CAST(opcion AS UNSIGNED)+10 AS opcion_uid');
   }
}
