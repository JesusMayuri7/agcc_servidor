<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Modulo;

class Menu extends Model
{
    protected $table='menu';
    protected $fillable =[
        "desc_menu","detalle","tipo"
    ];
    //primero la clase a relacionar
    //segundo la llave foranea de la tabla relacionar
    //tercero la llave de tabla a relacionar
   //return $this->hasMany('App\Comment', 'foreign_key', 'local_key');uno a muchos
    public function modulo(){
        return $this->hasMany(Modulo::class,'menu_id','id');
    }
}
