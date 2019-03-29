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
        $credentials = $request->only('email', 'password');
        try {
            // attempt to verify the credentials and create a token for the user
            if (!$this->jwt->attempt($credentials)) {
                return response()->json(['error' => 'Credenciales invalidas'], 401);
            }        
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        // all good so return the token
         

        $user = $this->jwt->user();
       
        // crear un foreach y array push
        $roles=[];
        foreach ($user->rol as $item) {
                array_push($roles,$item['id']);
        };
       // dd($roles);
        //$extra = User::with('rol.permiso')->where('id', $user->id)->get();
        $menu = Menu::with(['permiso.rol' => function($query) use ($roles) {
                $query->whereIn('id', $roles);
            }])->get();

       // dd($extra);
        
        $data['token'] = auth()->claims([
       //     'data' => $extra,
            //'rol' => $user->rol,
            /*'menu' => Menu::with(['permiso' => function($query) use ($user) {
                $query->where('id', $user->rol->id);
            } ])->get(),            */            
        ])->attempt($credentials);        
        return response()->json([
            'message' => 'Success',
            'data' => $menu /// AQUI ME QUEDE...PRUEBA EN INSOMIA
        ]);
        //return response()->json(compact('token'));
    }
}
