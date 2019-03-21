<?php

namespace App\GraphQL\Type;

use App\Http\Models\TipoProducto;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class TipoProductoType extends GraphQLType
{
    protected $attributes = [
        'name' => 'tipo_producto',
        'description' => 'Tipo de tipo_producto',
        'model' => TipoProducto::class, // define model for users type
    ];
    
    // define field of type
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'The id of the user'
            ],
            'desc_tipo_producto' => [
                'type' => Type::string(),
                'description' => 'The desc_tipo_producto of user'
            ],
            'interes' => [
                'type' => Type::float(),
                'description' => 'The interes of the user'
            ],
            'mora' => [
                'type' => Type::float(),
                'description' => 'The mora of the user'
            ],
            'plazo_minimo' => [
                'type' => Type::int(),
                'description' => 'plazo_minimo'
            ],
            'plazo_maximo' => [
                'type' => Type::int(),
                'description' => 'plazo_maximo'
            ],
            'activo' => [
                'type' => Type::int(),
                'description' => 'activo'
            ],
            'perfil_cliente' => [
                'type' => Type::listOf(GraphQL::type('perfil_clienteType')),
                'description' => 'The profile of the user'
            ],
/*            'perfil_cliente_tipo_producto_id' => [
                'type' => Type::string(),
                'description' => 'The profile of the user',
                'resolve' => function ($group) {
                    return $group->perfil_cliente;
                    },
                'selectable'=>false
            ],*/
        ];
    }
    protected function resolveNombresField($root, $args)
    {
        return strtolower($root->nombres);
    }
}