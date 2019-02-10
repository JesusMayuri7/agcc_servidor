<?php

namespace App\GraphQL\Mutation;

use App\Http\Models\GiroNegocio;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class GiroNegocioMutation extends Mutation
{
    protected $attributes = [
        'name' => 'giro_negocio'
    ];
    public function type()
    {
        return GraphQL::type('giro_negocioType');
    }
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'desc_giro_negocio' => [
                'name' => 'desc_giro_negocio',
                'type' => Type::string()
            ],
            'margen_minimo' =>[
                'name' => 'margen_minimo',
                'type' => Type::float()
            ],
            'margen_maximo' => [
                'name' => 'margen_maximo',
                'type' => Type::float()
            ],
            'activo' => [
                'name' => 'activo',
                'type' => Type::int()
            ]
            
        ];
    }
    public function resolve($root, $args)
    {
        //$args['password'] = bcrypt($args['password']);
        $user = GiroNegocio::create($args);
        if (!$user) {
            return null;
        }
        //$user->user_profiles()->create($args);
        return $user;
    }
}