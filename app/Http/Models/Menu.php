<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Permiso;

class Menu extends Model
{
    protected $table='menu';
    protected $fillable =[
        "desc_menu","detalle","tipo"
    ];
    protected $visible = ['desc_menu','permiso'];
    //primero la clase a relacionar
    //segundo la llave foranea de la tabla relacionar
    //tercero la llave de tabla a relacionar
   //return $this->hasMany('App\Comment', 'foreign_key', 'local_key');uno a muchos
   public function permiso()
   {
       return $this->hasMany(Permiso::class,'menu_id','id');
   }
}
