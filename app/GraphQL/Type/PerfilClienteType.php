<?php

namespace App\GraphQL\Type;

use App\Http\Models\PerfilCliente;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PerfilClienteType extends GraphQLType
{
    protected $attributes = [
        'name' => 'perfil_cliente',
        'description' => 'Tipo de perfil_cliente',
        'model' => PerfilCliente::class, // define model for users type
    ];
    
    // define field of type
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'The id of the user'
            ],
            'desc_perfil_cliente' => [
                'type' => Type::string(),
                'description' => 'The email of user'
            ],
            'linea_credito_id' => [
                'type' => Type::int(),
                'description' => 'linea_credito_id'
            ],
            'created_at' => [
                'name' => 'created_at',
                'type' => Type::string()
            ],
            'updated_at' => [
                'name' => 'updated_at',
                'type' => Type::string()
            ],
            'tipo_producto' => [
                'type' => Type::listOf(GraphQL::type('tipo_productoType')),
                'description' => 'The profile of the user'
            ],
            'linea_credito' => [
                'type' => GraphQL::type('linea_creditoType'),
                'description' => 'The profile of the user'
            ],
            'desc_linea_credito' => [
                'type' => Type::string(),
                'description' => 'The profile of the user',
                'resolve' => function ($root) { // As a workaround
                    return $root->linea_credito['desc_linea_credito'];
                    },
                'selectable' => false
            ]
        ];
    }
}