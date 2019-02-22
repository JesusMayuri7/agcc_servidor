<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models;

class LineaCredito extends Model
{
   protected $table='linea_credito';
   protected $fillable= [
    "desc_linea_credito","tipo_interes","monto_minimo","monto_maximo","activo"
];

   public function perfil_cliente() {
       // de linea_credito de uno a muchos con perfin_cliente
       return $this->hasMany(PerfilCliente::class,'linea_credito_id','id');
   }
}
