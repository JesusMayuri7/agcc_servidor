<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Menu;

class PermisosController extends Controller
{    
    public function index(Request $request)
    {
        $payload=auth()->payload();
        //dd()
        //return response()->json($payload);
        // CUANDO CARGUE EL MENU...AL CREAR...TRAER LOS PERMISOS DE </MENNU>
        // Y SUS PERMISOS DE FORMULARIO...ENVIANDO EL TOKEN...WHERE id
      /*  $menu = Menu::Join('permiso','menu.id','=','permiso.menu_id')
        ->Join('rol_permiso','permiso_id','=','permiso.id')
        ->Join('rol','rol.id','=','rol_permiso.rol_id')
        ->Join('empleado_rol','empleado_rol.rol_id','=','rol.id')
        ->where('empleado_rol.empleado_id',$user->id)
        ->select('menu.id','menu.desc_menu')
        ->groupBy('menu.id')
        ->get();*/

        /*$roles=[];
        foreach ($payload['rol'] as $item) {
                array_push($roles,$item['id']);
        };*/
        //dd($payload['rol']->id);
        DB::connection()->enableQueryLog();
     /*     $menu = Menu::
             whereHas('permiso.rol' ,function ($query) use ($payload) {
                      $query->where('rol_permiso.rol_id',$payload['rol']->id);                                   
              })  
            ->with(['permiso.rol.empleado' => function($query) use ($payload) {
                $query->where('empleado.id', $payload['sub']);
            }])         
          ->get();
         
*/
          $menu = DB::table('menu')
          ->Join('permiso','menu.id','=','permiso.menu_id')          
          ->Join('rol_permiso','permiso_id','=','permiso.id')
          ->Join('rol','rol.id','=','rol_permiso.rol_id')
          ->Join('empleado','rol.id','=','empleado.rol_id')
          ->where('empleado.id',$payload['sub'])
          ->where('rol.id',$payload['rol']->id)
          ->select('menu.id','menu.desc_menu','menu.formulario','permiso.opcion')
          ->get();
          $queries = DB::getQueryLog();
          //return dd($queries);
         // ->select('menu.id','menu.desc_menu')
           // ->selectRaw('CAST(permiso.opcion AS UNSIGNED)+10 AS opcion_uid')            
            
            return response()->json([
                'message' => 'exito',
                'data' => $menu /// AQUI ME QUEDE...PRUEBA EN INSOMIA
            ]);
    }
}
