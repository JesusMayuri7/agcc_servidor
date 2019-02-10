<?php

namespace App\GraphQL\Type;

use App\Http\Models\EmpleadoRol;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class EmpleadoRolType extends GraphQLType
{
    protected $attributes = [
        'name' => 'empleado_rol',
        'description' => 'Tipo de empleado_rol',
        'model' => EmpleadoRol::class, // define model for users type
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