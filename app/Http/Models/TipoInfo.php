<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\TipoInfoDetalle;

class TipoInfo extends Model
{
    protected $table='tipo_info';
    protected $fillable = [
        "desc_tipo_info","activo","informacion"
    ];
    //primero la clase a relacionar
    //segundo la llave foranea de la tabla relacionar
    //tercero la llave de tabla a relacionar
   //return $this->hasMany('App\Comment', 'foreign_key', 'local_key');uno a muchos
    public function tipoInfoDetalle(){
        return $this->hasMany(TipoInfoDetalle::class,'tipo_info_id','id');
    }
}
