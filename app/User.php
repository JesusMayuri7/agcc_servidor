<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\Models\Solicitud;
use App\Http\Models\Auditoria;
use App\Http\Models\Rol;
use App\Http\Models\Vpermiso;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    protected $table= 'empleado';
    //protected $attributes = ['full_name'];
    protected $appends = ['full_name'];
    /* The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable= [
        "dni","nombres","apellido_paterno","apellido_materno","usuario","activo","email","password","created_at","updated_at","rol"
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $visible = ['id', 'dni','full_name','email','rol'];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

     public function getJWTCustomClaims()
    {
       return [
            'rol' => $this->rol
            ];
         //return [];
    }

    public function solicitud(){
        return $this->hasMany(Solicitud::class,'empleado_id','id');
     //primero la clase a relacionar
    //segundo la llave foranea de la tabla relacionar
    //tercero la llave de tabla a relacionar
   //return $this->hasMany('App\Comment', 'foreign_key', 'local_key');uno a muchos
    }
    public function rol(){
        //Primero va la clase a relacionar (PerfilCliente)
       //Segundo el nombre de la tabla pivot )perfil_cliente_tipo_producto)
       //La clave foranea de la Clase Principal (TipoProducto)
       // la clave foranea de la clase a relacionar (PerfilCliente= ..(perfil_cliente_id)
       return $this->belongsToMany(Rol::class,'empleado_rol','empleado_id','rol_id');
    }
    public function auditoria(){
        return $this->hasMany(Auditoria::class,'empleado_id','id');

         //primero la clase a relacionar
            //segundo la llave foranea de la tabla relacionar
                //tercero la llave de tabla a relacionar
                    //return $this->hasMany('App\Comment', 'foreign_key', 'local_key');uno a muchos
    }
    public function vrol(){
        return $this->hasMany(Vpermiso::class,'user_id','id');
    }

    public function getFullNameAttribute()
    {
        return strtoupper($this->nombres.' '.$this->apellido_paterno.' '.$this->apellido_materno);
    }
}
