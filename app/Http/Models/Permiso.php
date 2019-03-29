<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

use App\Http\Models\MenuPermisoModulo;
class Permiso extends Model
{
    protected $table='permiso';
    protected $fillable = [
        "desc_permiso"
    ];
    protected $visible = ['opcion','modulo','menu','rol'];

   /* public function modulo()
    {
        return $this->hasMany(Modulo::class,'permiso_id','id');
    }*/

    public function menu(){
        return $this->belongsTo(Menu::class,'menu_id','id');
    }

    public function rol() {
        return $this->belongsToMany('App\Http\Models\Rol','rol_permiso','permiso_id','rol_id');        
    }


}
