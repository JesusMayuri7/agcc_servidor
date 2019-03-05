<?php

namespace App\GraphQL\Type;

use App\Http\Models\Avales;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class AvalesType extends GraphQLType
{
    protected $attributes = [
        'name' => 'avales',
        'description' => 'Tipo de Cliente',
        'model' => Avales::class, // define model for users type
    ];
    
    // define field of type
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user'
            ],
            'cliente_id' => [
                'type' => Type::int(),
                'description' => 'The cliente_id of user'
            ],
            'tipo' => [
                'type' => Type::string(),
                'description' => 'The tipo of user'
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