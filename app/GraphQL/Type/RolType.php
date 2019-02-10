<?php

namespace App\GraphQL\Type;

use App\Http\Models\Rol;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class RolType extends GraphQLType
{
    protected $attributes = [
        'name' => 'rol',
        'description' => 'Tipo de rol',
        'model' => Rol::class, // define model for users type
    ];
    
    // define field of type
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user'
            ],
            'desc_rol' => [
                'type' => Type::string(),
                'description' => 'The desc_rol of user'
            ],
            'detalle' => [
                'type' => Type::string(),
                'description' => 'The detalle of the user'
            ],
            'empleado' => [
                'type' => GraphQL::type('empleadoType'),
                'description' => 'The empleado of the user'
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