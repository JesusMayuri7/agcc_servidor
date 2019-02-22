<?php

namespace App\GraphQL\Type;

use App\Http\Models\LineaCredito;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class LineaCreditoType extends GraphQLType
{
    protected $attributes = [
        'name' => 'linea_credito',
        'description' => 'Tipo de linea_credito',
        'model' => LineaCredito::class, // define model for users type
    ];
    
    // define field of type
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user'
            ],
            'desc_linea_credito' => [
                'type' => Type::string(),
                'description' => 'The desc_linea_credito of user'
            ],
            'tipo_interes' => [
                'type' => Type::string(),
                'description' => 'The tipo_interes of the user'
            ],
            'monto_minimo' => [
                'type' => Type::float(),
                'description' => 'The monto_minimo of the user'
            ],
            'monto_maximo' => [
                'type' => Type::float(),
                'description' => 'The monto_maximo of the user'
            ],
            'activo' => [
                'type' => Type::int(),
                'description' => 'activo'
            ],
            'created_at' => [
                'type' => Type::string(),
                'description' => 'created_at'
            ],
            'updated_at' => [
                'type' => Type::string(),
                'description' => 'updated_at'
            ],
            'per_page' => [
                'name' => 'per_page',
                'type' => Type::int(),
                'description' => 'Display a specific page',
            ],
            'total' => [
                'name' => 'total',
                'type' => Type::int(),
                'description' => 'Display a specific page',
            ],
            'limit' => [
                    'name' => 'limit',
                    'type' => Type::int(),
                    'description' => 'Limit the items per page',
            ],
            'perfil_cliente' => [
                'type' => Type::listOf(GraphQL::type('perfil_clienteType')),
                'description' => 'The profile of the user'
            ]
            // field relation to model user_profiles
           /* 'user_profiles' => [
                'type' => GraphQL::type('user_profiles'),
                'description' => 'The profile of the user'
            ]*/
        ];
    }
    protected function resolveNombresField($root, $args)
    {
        return strtolower($root->nombres);
    }
}