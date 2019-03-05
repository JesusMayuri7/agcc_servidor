<?php

namespace App\Http\Controllers;
use App\Http\Models;
use App\User;
use App\Http\Models\Menu;
use App\Http\Models\Modulo;
use App\Http\Models\Permiso;
use App\Http\Models\Rol;
use App\Http\Models\Auditoria;
use App\Http\Models\PerfilClienteTipoProducto;
use App\Http\Models\TipoPrestamo;
use App\Http\Models\GiroNegocio;
use App\Http\Models\ReporteCrediticio;
use App\Http\Models\Resolucion;
use App\Http\Models\Cliente;
use App\Http\Models\Solicitud;
use App\Http\Models\Ahorro;
use App\Http\Models\LineaCredito;
use App\Http\Models\TipoProducto;
use App\Http\Models\PerfilCliente;
use App\Http\Models\TipoInfo;
use App\Http\Models\TipoInfoDetalle;
use App\Http\Models\MenuPemisoModulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller

{
    public function index()
    {
       // $users = Modulo::with('menu')->get(); 
        //$users = Permiso::with('modulo')->get(); 
        //$users = Permiso::with('rol')->get();
        //$users = Rol::with('empleado')->get();
        //$users = Solicitud::with('empleado')->get();
        //$users = Empleado::with('solicitud')->get();
      //  $users = User::get();
        //$users = Auditoria::with('empleado')->get();
        //$users = User::with('rol.permiso_menu.permiso.modulo_menu.menu.modulo')->get();
        $users= Cliente::get();
       // $data=$users->rol->mpm;

        // $users = Solicitud::with('perfilclientetipoproducto')->get();
        //$users = PerfilClienteTipoProducto::with('solicitud')->get();
        //$users = TipoPrestamo::with('solicitud')->get();
        //$users = GiroNegocio::with('solicitud')->get();
        //$users = Solicitud::with('giroNegocio')->get();
        //$users = Solicitud::with('reporteCeop')->get();
        //$users = ReporteCrediticio::with('solicitud')->get();
        //$users = Solicitud::with('reporteCrediticio')->get();
        //$users = Solicitud::with('resolucion')->get();
        //$users = Resolucion::with('solicitud')->get();
        //$users = Solicitud::with('cliente')->get();
        //$users = Cliente::with('solicitud_cliente')->get();
      //  $users = Solicitud::with('tipo_info_detalle.tipoInfo.')->get();
        //$users = TipoInfoDetalle::with('solicitud')->get();
        //$users = Ahorro::with('solicitud')->get();
        //$users = Solicitud::with('ahorro')->get();
       // $users = TipoProducto::with('perfil_cliente')->get();
       //$users = TipoInfo::with('tipoInfoDetalle')->get();
      // $users = PerfilCliente::with('tipo_producto')->get();
       //$users=PerfilCliente::with('lineaCredito')->get();
       //$users=LineaCredito::get();
       return response(['data'=> $users]);
    }

    public function show($id)
    {
        return "Mostrando el detalle del usuario: {$id}";
    }
    public function create()
    {
        return 'Crear nuevo usuario';
    }
}
