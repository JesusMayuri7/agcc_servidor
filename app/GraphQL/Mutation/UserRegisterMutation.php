<?php
/**
 * Created by PhpStorm.
 * User: ardani
 * Date: 8/4/17
 * Time: 10:02 AM
 */

namespace App\GraphQL\Mutation;

use Illuminate\Support\Collection;
use GraphQL\Error\Error;
use Rebing\GraphQL\Error\ValidationError;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
//use Tymon\JWTAuth\Facades\JWTAuth;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Exceptions\ErrorCatch;
use App\User;

class UserRegisterMutation extends Mutation

{
    protected $attributes = [
        'name' => 'userRegister'
    ];

    public function type()
    {
       // return new Type::string();
      return GraphQL::type('empleadoType');
    }

/*    public function authorize(array $args)
    {
        try {
            $this->auth = JWTAuth::parseToken()->authenticate();
        } catch (\Exception $e) {
            $this->auth = null;
        }
        return (boolean) $this->auth;  
    }*/

    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),           
            ],
            'dni' => [
                'name' => 'dni',
                'type' => Type::nonNull(Type::string()),
            
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required', 'email'],
           
            ],
            'password' => [
                'name' => 'password',
                'type' => Type::nonNull(Type::string()),
           
            ],
            'nombres' => [
                'name' => 'nombres',
                'type' => Type::nonNull(Type::string()),              
            ],
            'apellido_paterno' => [
                'name' => 'apellido_paterno',
                'type' => Type::nonNull(Type::string()),              
            ],
            'apellido_materno' => [
                'name' => 'apellido_materno',
                'type' => Type::nonNull(Type::string()),              
            ],
        ];
    }

    public function resolve($root, $args)
    {  
      $user= User::create([
        'dni'=>$args['dni'],
        //'nombres'=>$this->auth->idtrabajador,
        'nombres'=>$args['nombres'],
        'apellido_paterno'=>$args['apellido_paterno'],
        'apellido_materno'=>$args['apellido_materno'],
        'email'=>$args['email'],
        'password'=>bcrypt($args['password']),
      ]); 
      //return $user->exception='aaaaaaaa';
      return $user;
       /* if (!$token = JWTAuth::attempt(['email'=>$args['email'],'password'=>$args['password']])) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }*/
        
       
     /*  return response()->json([
            'token' => 'hola',
           // 'expires' => auth('api')->factory()->getTTL() * 60,
        ]);*/
    }
}
