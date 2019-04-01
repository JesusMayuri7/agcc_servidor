<?php

namespace App\GraphQL\Mutation;

use App\User;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class EmpleadoMutation extends Mutation
{
    protected $attributes = [
        'name' => 'empleado'
    ];
    public function type()
    {
        return GraphQL::type('empleadoType');
    }
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'dni' => [
                'name' => 'dni',
                'type' => Type::string()
            ],
            'nombres' => [
                'name' => 'nombres',
                'type' => Type::string()
            ],
            'apellido_paterno' => [
                'name' => 'apellido_paterno',
                'type' => Type::string()
            ],
            'apellido_materno' => [
                'name' => 'apellido_materno',
                'type' => Type::string()
            ],
            'usuario' => [
                'name' => 'usuario',
                'type' => Type::string()
            ],
            'password' => [
                'name' => 'password',
                'type' => Type::string()
            ],
            'activo' => [
                'name' => 'activo',
                'type' => Type::int()
            ],
            'created_at' => [
                'name' => 'created_at',
                'type' => Type::string()
            ],
            'updated_at' => [
                'name' => 'updated_at',
                'type' => Type::string()
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::string()
            ],
            'rol_id' => [
                'name' => 'rol_id',
                'type' => Type::int()
            ],
        ];
    }
    public function resolve($root, $args)
    {
        $where = function ($query) use ($args) {
            if (isset($args['id'])) {
                $query->where('id',$args['id']);
            }
            if (isset($args['dni'])) {
                $query->where('dni',$args['dni']);
            }

        };
        if (isset($args['id'])) {
           $args['password'] = bcrypt($args['password']); 
           $user = User::find($args['id']);
           if (!$user) {
            return null;
            }
           $user->update($args); 
           return $user;
        }
        else {
            $args['password'] = bcrypt($args['password']);
           // dd($args['password']);
            $user = User::create($args);
            if (!$user) {
                return null;
            }
            return $user;
        }
    }
}