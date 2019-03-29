<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Permiso;
use App\Http\Models\Modulo;
use App\Http\Models\Menu;

class MenuPermisoModulo extends Model
{
    protected $table='menu_permiso_modulo';
    protected $primaryKey='id';

    //protected $visible = [ 'menu','permiso','modulo'];

    public function permiso(){
        //primero la clase  a relacionar                    ('TipoInfo::class')
        //segungo llave foranea de la tabla a relacionar    ('tipo_info_id')
        //tercero llave principal de la tabla               ('id')
        //return $this->belongsTo('App\Post', 'foreign_key', 'other_key');  de muchos a uno
       return $this->belongsTo(Permiso::class,'permiso_id','id');
    }

    public function menu(){
        //primero la clase  a relacionar                    ('TipoInfo::class')
        //segungo llave foranea de la tabla a relacionar    ('tipo_info_id')
        //tercero llave principal de la tabla               ('id')
        //return $this->belongsTo('App\Post', 'foreign_key', 'other_key');  de muchos a uno
       return $this->belongsTo(Menu::class,'menu_id','id');
    }

    public function modulo(){
        //primero la clase  a relacionar                    ('TipoInfo::class')
        //segungo llave foranea de la tabla a relacionar    ('tipo_info_id')
        //tercero llave principal de la tabla               ('id')
        //return $this->belongsTo('App\Post', 'foreign_key', 'other_key');  de muchos a uno
       return $this->belongsTo(Modulo::class,'modulo_id','id');
    }
}
