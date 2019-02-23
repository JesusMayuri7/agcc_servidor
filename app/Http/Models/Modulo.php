<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
Use App\Http\Models\Permiso;
Use App\Http\Models\Menu;
class Modulo extends Model
{
    protected $table='modulo';
    protected $visible = ['desc_modulo','permiso'];
       public function permiso(){
        //primero la clase  a relacionar                    ('TipoInfo::class')
        //segungo llave foranea de la tabla a relacionar    ('tipo_info_id')
        //tercero llave principal de la tabla               ('id')
        //return $this->belongsTo('App\Post', 'foreign_key', 'other_key');  de muchos a uno
       return $this->belongsTo(Permiso::class,'permiso_id','id');
    }

    public function rol_modulo(){
        //primero la clase  a relacionar                    ('TipoInfo::class')
        //segungo llave foranea de la tabla a relacionar    ('tipo_info_id')
        //tercero llave principal de la tabla               ('id')
        //return $this->belongsTo('App\Post', 'foreign_key', 'other_key');  de muchos a uno
        return $this->hasMany(RolModulo::class,'modulo_id','id');
    }
/*
    return $this->hasManyThrough(
        Menu::class,          // The model to access to
        Permiso::class, // The intermediate table that connects the User with the Podcast.
        'user_id',                 // The column of the intermediate table that connects to this model by its ID.
        'podcast_id',              // The column of the intermediate table that connects the Podcast by its ID.
        'id',                      // The column that connects this model with the intermediate model table.
        'podcast_id'               // The column of the Audio Files table that ties it to the Podcast.
    );*/
}
