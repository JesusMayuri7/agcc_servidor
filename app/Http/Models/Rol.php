<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Http\Models\MenuPermisoModulo;

class Rol extends Model
{
    protected $table='rol';
    protected $fillable=[
        "desc_rol","detalle"
    ];
    protected $visible = ['desc_rol','mpm'];

    public function empleado(){
       return $this->belongsToMany(User::class,'empleado_rol','rol_id','empleado_id');
    }

    public function mpm(){
     return $this->belongsToMany(MenuPermisoModulo::class,'rol_mpm','rol_id','menu_permiso_modulo_id');
    }

    
}
