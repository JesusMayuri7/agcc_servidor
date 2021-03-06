<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Http\Models\Permiso;

class Rol extends Model
{
    protected $table='rol';
    protected $fillable=[
        "desc_rol","detalle"
    ];
    protected $visible = ['id','desc_rol','permiso'];

    public function empleado(){
       return $this->hasMany(User::class,'rol_id','id');
    }

    public function permiso(){
     return $this->belongsToMany(Permiso::class,'rol_permiso','rol_id','permiso_id');                  
    }

    
}
