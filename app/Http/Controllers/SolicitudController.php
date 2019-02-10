<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    public function index()
    {
        $users = Empleado::with('solicitud')->get();
        return response([
            "data"=>$users
        ]);
    }

}
