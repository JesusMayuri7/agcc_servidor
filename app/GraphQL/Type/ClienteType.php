<?php

namespace App\GraphQL\Type;

use App\Http\Models\Cliente;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ClienteType extends GraphQLType
{
    protected $attributes = [
        'name' => 'cliente',
        'description' => 'Tipo de Cliente',
        'model' => Cliente::class, // define model for users type
    ];
    
    // define field of type
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user'
            ],
            'dni' => [
                'type' => Type::int(),
                'description' => 'The dni of user'
            ],
            'nombres' => [
                'type' => Type::string(),
                'description' => 'The nombres of the user'
            ],
            'apellido_paterno' => [
                'type' => Type::string(),
                'description' => 'The name of the user'
            ],
            'apellido_materno' => [
                'type' => Type::string(),
                'description' => 'Apellido materno del Cliente'
            ],
            'fecha_nacimiento' =>[
                'type' => Type::string(),
                'description' => 'fecha_nacimiento'
            ],
            'activo' =>[
                'type' => Type::int(),
                'name' => 'activo'
            ],
            'created_at' =>[
                'type' => Type::string(),
                'name' => 'created_at'
            ],
            'updated_at' =>[
                'type' => Type::string(),
                'name' => 'updated_at'
            ],
            'direccion' =>[
                'type' => Type::string(),
                'name' => 'direccion'
            ],
            'telefono' =>[
                'type' => Type::int(),
                'name' => 'telefono'
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