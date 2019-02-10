<?php

namespace App\GraphQL\Mutation;

use App\Http\Models\TipoProducto;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class TipoProductoMutation extends Mutation
{
    protected $attributes = [
        'name' => 'tipo_producto'
    ];
    public function type()
    {
        return GraphQL::type('tipo_productoType');
    }
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'desc_tipo_producto' => [
                'name' => 'desc_tipo_producto',
                'type' => Type::string()
            ],
            'interes' =>[
                'name' => 'interes',
                'type' => Type::float()
            ],
            'mora' => [
                'name' => 'mora',
                'type' => Type::float()
            ],
            'plazo_minimo' => [
                'name' => 'plazo_minimo',
                'type' => Type::int()
            ],
            'plazo_maximo'=>[
                'name' => 'plazo_maximo',
                'type' => type::int()
            ]
            
        ];
    }
    public function resolve($root, $args)
    {
        //$args['password'] = bcrypt($args['password']);
        $user = TipoProducto::create($args);
        if (!$user) {
            return null;
        }
        //$user->user_profiles()->create($args);
        return $user;
    }
}