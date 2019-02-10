<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Solicitud;
class TipoPrestamo extends Model
{
    protected $table = 'tipo_prestamo';
    protected $fillable = [
        "desc_tipo_prestamo","detalle","activo"
    ];
    public function solicitud(){
        return $this->hasMany(Solicitud::class,'tipo_prestamo_id','id');
    }
}
