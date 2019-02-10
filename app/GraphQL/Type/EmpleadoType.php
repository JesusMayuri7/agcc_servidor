<?php

namespace App\GraphQL\Type;

use App\Http\Models\Empleado;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class EmpleadoType extends GraphQLType
{
    protected $attributes = [
        'name' => 'empleado',
        'description' => 'Tipo de empleado',
        'model' => Empleado::class, // define model for users type
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
                'type' => Type::string(),
                'description' => 'The dni of user'
            ],
            'nombres' => [
                'type' => Type::string(),
                'description' => 'The nombres of the user'
            ],
            'apellido_paterno' => [
                'type' => Type::string(),
                'description' => 'The apellido_paterno of the user'
            ],
            'apellido_materno' => [
                'type' => Type::string(),
                'description' => 'Apellido materno del Cliente'
            ],
            'usuario' => [
                'type' => Type::string(),
                'description' => 'usuario'
            ],
            'password' => [
                'type' => Type::string(),
                'description' => 'clave'
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'clave'
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
            'refresh_token' =>[
                'type' => Type::string(),
                'description' => 'refresh_token'
            ],
            'tipo_producto' => [
                'type' => GraphQL::type('tipo_productoType'),
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