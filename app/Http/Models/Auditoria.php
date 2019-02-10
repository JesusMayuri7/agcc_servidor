<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Empleado;
class Auditoria extends Model
{
    protected $table='auditoria';

    protected $fillable= [
        "tabla","campo_old","campo_new","empleado_id"
    ];
    public function empleado(){
        //primero la clase  a relacionar                    ('TipoInfo::class')
        //segungo llave foranea de la tabla a relacionar    ('tipo_info_id')
        //tercero llave principal de la tabla               ('id')
        //return $this->belongsTo('App\Post', 'foreign_key', 'other_key');  de muchos a uno
       return $this->belongsTo(Empleado::class,'empleado_id','id');
    }
}
