<?php

namespace App\GraphQL\Type;

use App\Http\Models\SolicitudAhorro;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class SolicitudAhorroType extends GraphQLType
{
    protected $attributes = [
        'name' => 'solicitud ahorro',
        'description' => 'Tipo de solicitud Ahorro',
        'model' => SolicitudAhorro::class, // define model for users type
    ];
    
    // define field of type
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user'
            ],
            'porcentaje' => [
                'type' => Type::float(),
                'description' => 'The porcentaje of user'
            ],
            'monto' => [
                'type' => Type::float(),
                'description' => 'The monto of the user'
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