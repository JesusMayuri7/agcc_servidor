<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
Use App\Http\Models\Solicitud;
class PerfilClienteTipoProducto extends Model
{
    protected $table ='perfil_cliente_tipo_producto';
    public function solicitud(){
        return $this->hasMany(Solicitud::class,'perfil_cliente_tipo_producto_id','id');
    }
    
}
