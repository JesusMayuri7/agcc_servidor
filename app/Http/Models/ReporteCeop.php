<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Solicitud;
class ReporteCeop extends Model
{
    protected $table='reporte_ceop';
    protected $fillable = [
        "desc_reporte_ceop","activo"
    ];
    //primero la clase a relacionar
    //segundo la llave foranea de la tabla relacionar
    //tercero la llave de tabla a relacionar
   //return $this->hasMany('App\Comment', 'foreign_key', 'local_key');uno a muchos
    public function solicitud(){
        return $this->hasMany(Solicitud::class,'reporte_ceop_id','id');
    }
}
