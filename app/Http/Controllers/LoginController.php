<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;
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
            if (!$this->jwt->claims(['foo' => 'bar'])->attempt($credentials)) {
                return response()->json(['error' => 'Credenciales invalidas'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        // all good so return the token
        $user = $this->jwt->user()->rol;
     /*   $data['token'] = auth()->claims([
            //'user_id' => $user->id,
            'rol' => $user->rol,
            'email' => $user->email,
        ])->attempt($credentials);*/
        $data['user'] =  $user;
        return response()->json([
            'message' => 'Success',
            'data' => $data
        ]);
        //return response()->json(compact('token'));
    }
}
