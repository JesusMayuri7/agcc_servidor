<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SolicitudController extends Controller
{
    public function index()
    {
        $users = Empleado::with('solicitud')->get();
        return response([
            "data"=>$users
        ]);
    }

    public function resumen_info(Request $request)
    {
        $info = DB::select('call sp_resumen_info(?)',array($request['idsolicitud']));
       // dd($request);
       return response()->json([
        'message' => 'exito',
        'data' => $info /// AQUI ME QUEDE...PRUEBA EN INSOMIA
    ]);
    }

}
