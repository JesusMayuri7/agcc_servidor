<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
Use App\Http\Models\Permiso;
Use App\Http\Models\Menu;
class Modulo extends Model
{
    protected $table='modulo';

    public function permiso(){
        return $this->belongsToMany(Permiso::class,'permiso_modulo','modulo_id','permiso_id')
        ->withPivot('id');
       }
       public function menu(){
        //primero la clase  a relacionar                    ('TipoInfo::class')
        //segungo llave foranea de la tabla a relacionar    ('tipo_info_id')
        //tercero llave principal de la tabla               ('id')
        //return $this->belongsTo('App\Post', 'foreign_key', 'other_key');  de muchos a uno
       return $this->belongsTo(Menu::class,'menu_id','id');
    }
}
