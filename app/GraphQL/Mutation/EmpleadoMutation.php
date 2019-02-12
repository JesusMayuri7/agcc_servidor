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
                'type' => Type::nonNull(Type::string())
            ],
            'nombres' => [
                'name' => 'nombres',
                'type' => Type::nonNull(Type::string())
            ],
            'apellido_paterno' => [
                'name' => 'apellido_paterno',
                'type' => Type::nonNull(Type::string())
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
            'usuario' => [
                'name' => 'usuario',
                'type' => Type::string()
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::string()
            ],
            'created_at' => [
                'name' => 'created_at',
                'type' => Type::string()
            ],
            'updated_at' => [
                'name' => 'updated_at',
                'type' => Type::string()
            ],

        ];
    }
    public function resolve($root, $args)
    {
        $args['password'] = bcrypt($args['password']);
        $user = User::create($args);
        if (!$user) {
            return null;
        }
        //$user->user_profiles()->create($args);
        return $user;
    }
}