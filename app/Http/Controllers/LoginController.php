<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;
use App\User;
use App\Http\Models\Menu;

class LoginController extends Controller
{
    private $jwt;
    public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;
    }


    public function authenticate(Request $request)
    {
        // grab credentials from the request
        //$credentials = $request->only('email', 'password');
        $credentials = array_merge($request->only(['email', 'password']), ['activo' => 1]);
        try {
            // attempt to verify the credentials and create a token for the user
            if (!$token = $this->jwt->attempt($credentials)) {
                return response()->json(['error' => 'Credenciales invalidas'], 401);
            }        
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        // all good so return the token
         

        $user = $this->jwt->user();
       
        // crear un foreach y array push
        /*$roles=[];
        foreach ($user->rol as $item) {
                array_push($roles,$item['id']);
        };*/       
        //$extra = User::with('rol.permiso')->where('id', $user->id)->get();
        /*$menu = Menu::with(['permiso.rol' => function($query) use ($roles) {
                $query->whereIn('id', $roles);
            }])->get();*/
     /*   $menu = Menu::Join('permiso','menu.id','=','permiso.menu_id')
        ->Join('rol_permiso','permiso_id','=','permiso.id')
        ->Join('rol','rol.id','=','rol_permiso.rol_id')
        ->Join('empleado_rol','empleado_rol.rol_id','=','rol.id')
        ->where('empleado_rol.empleado_id',$user->id)
        ->select('menu.id','menu.desc_menu')
        ->groupBy('menu.id')
        ->get();*/

                 
        /*$data['token'] = auth()->claims([
            'menu' => $extra,
            'rol' => $user->rol,
            /*'menu' => Menu::with(['permiso' => function($query) use ($user) {
                $query->where('id', $user->rol->id);
            } ])->get(),                       
        ])->attempt($credentials);*/
        $data['token']=$token;
        //$data['menu']=$menu;
        return response()->json([
            'message' => 'exito',
            'data' => $data /// AQUI ME QUEDE...PRUEBA EN INSOMIA
        ]);
        //return response()->json(compact('token'));
    }
}
