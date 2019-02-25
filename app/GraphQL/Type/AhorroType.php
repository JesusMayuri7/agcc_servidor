<?php

namespace App\GraphQL\Type;

use App\Http\Models\Ahorro;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class AhorroType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ahorro',
        'description' => 'Tipo de Ahorro',
        'model' => Ahorro::class, // define model for users type
    ];
    
    // define field of type
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user'
            ],
            'desc_ahorro' => [
                'type' => Type::string(),
                'description' => 'The desc_ahorro of user'
            ],
            'porcentaje' => [
                'type' => Type::float(),
                'description' => 'The porcentaje of the user'
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