<?php

namespace App\Http\Models;
use App\Http\Models\Auditoria;
use App\Http\Models\Empleado;
use App\Http\Models\PerfilClienteTipoProducto;
use App\Http\Models\Resolucion;
use App\Http\Models\ReporteCrediticio;
use App\Http\Models\GiroNegocio;
use App\Http\Models\TipoPrestamo;
use App\Http\Models\Garantia;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table='solicitud';
    protected $fillable= [
        "activo","monto","plazo","cuota","interes","comentario","nro_solicitud","estado","cliente_id","empleado_id","reporte_ceop_id","historial_crediticio_id",
        "giro_negocio_id","tipo_prestamo_id","tipo_producto_id","garantia_id","perfil_cliente_tipo_producto_id"
    ];

    public function ahorro(){
         //Primero va la clase a relacionar (PerfilCliente)
        //Segundo el nombre de la tabla pivot )perfil_cliente_tipo_producto)
        //La clave foranea de la Clase Principal (TipoProducto)
        // la clave foranea de la clase a relacionar (PerfilCliente= ..(perfil_cliente_id)
        return $this->belongsToMany('App\Http\Models\Ahorro','solicitud_ahorro','solicitud_id','ahorro_id')
        ->withPivot('monto');
    }

    public function tipo_info_detalle(){
           return $this->belongsToMany('App\Http\Models\TipoInfoDetalle','solicitud_detalle','solicitud_id','tipo_info_detalle_id')
           ->withPivot('monto');
    }

    public function avales() {
        return $this->belongsToMany('App\Http\Models\Cliente','avales','solicitud_id','cliente_id')->withPivot('tipo');        
    }

    public function resolucion(){
        // seleccionamos el padre
        //return $this->hasOne('App\Profile', 'clave_foranea', 'clave_local_a_relacionar');
        return $this->hasOne('App\http\Models\Resolucion','solicitud_id','id');
    }

    public function reporteCeop(){
       return $this->belongsTo(ReporteCeop::class,'reporte_ceop_id','id');
    }

    public function reporteCrediticio(){
        return $this->belongsTo(ReporteCrediticio::class,'historial_crediticio_id','id');
    }

    public function giroNegocio(){
        return $this->belongsTo(GiroNegocio::class,'giro_negocio_id','id');
    }

    public function tipoPrestamo(){
        return $this->belongsTo(TipoPrestamo::class,'tipo_prestamo_id','id');
    }

    public function garantias(){
        return $this->belongsTo(Garantia::class,'garantia_id','id');
    }

    public function perfilclientetipoproducto(){
        return $this->belongsTo(PerfilClienteTipoProducto::class,'perfil_cliente_tipo_producto_id','id');
    }  

    public function empleado(){
       return $this->belongsTo(User::class,'empleado_id','id');
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class,'cliente_id','id');
     }
}
