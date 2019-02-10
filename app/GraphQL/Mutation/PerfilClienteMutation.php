<?php

namespace App\GraphQL\Mutation;

use App\Http\Models\PerfilCliente;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class PerfilClienteMutation extends Mutation
{
    protected $attributes = [
        'name' => 'perfil_cliente'
    ];
    public function type()
    {
        return GraphQL::type('perfil_clienteType');
    }
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'desc_perfil_cliente' => [
                'name' => 'desc_perfil_cliente',
                'type' => Type::string()
            ],
            'linea_credito_id' =>[
                'name' => 'linea_credito_id',
                'type' => Type::int()
            ],
            

            
        ];
    }
    public function resolve($root, $args)
    {
        //$args['password'] = bcrypt($args['password']);
        $user = PerfilCliente::create($args);
        if (!$user) {
            return null;
        }
        //$user->user_profiles()->create($args);
        return $user;
    }
}