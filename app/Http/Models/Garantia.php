<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Solicitud;
class Garantia extends Model
{
    protected $table ='garantia';
    protected $fillable=[
        "desc_garantia","activo"
    ];
    public function solicitud(){
        return $this->hasMany(Solicitud::class,'garantia_id','id');
    }
}
