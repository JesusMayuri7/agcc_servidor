<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Menu;
use App\Http\Models\Modulo;
class Permiso extends Model
{
    protected $table='permiso';
    protected $fillable = [
        "desc_permiso"
    ];
    protected $visible = ['id', 'desc_permiso','menu'];

    public function modulo()
    {
        return $this->hasMany(Modulo::class,'permiso_id','id');
    }

    public function menu(){
        return $this->belongsTo(Menu::class,'menu_id','id');
    }


}
