<?php

namespace App\GraphQL\Mutation;

use App\Http\Models\Cliente;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class ClienteMutation extends Mutation
{
    protected $attributes = [
        'name' => 'cliente'
    ];
    public function type()
    {
        return GraphQL::type('clienteType');
    }
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::string()
            ],
            'dni' => [
                'name' => 'dni',
                'type' => Type::nonNull(Type::int())
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
            'fecha_nacimiento' => [
                'name' => 'fecha_nacimiento',
                'type' => Type::nonNull(Type::string())
            ],
        ];
    }
    public function resolve($root, $args)
    {
        //$args['password'] = bcrypt($args['password']);
        $user = Cliente::create($args);
        if (!$user) {
            return null;
        }
        //$user->user_profiles()->create($args);
        return $user;
    }
}