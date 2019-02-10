<?php

namespace App\GraphQL\Type;

use App\Http\Models\Garantia;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class GarantiaType extends GraphQLType
{
    protected $attributes = [
        'name' => 'garantia',
        'description' => 'Tipo de Garantia',
        'model' => Garantia::class, // define model for users type
    ];
    
    // define field of type
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user'
            ],
            'desc_garantia' => [
                'type' => Type::string(),
                'description' => 'The email of user'
            ],
            'activo' => [
                'type' => Type::int(),
                'description' => 'The name of the user'
            ],
            'created_at' => [
                'type' => Type::string(),
                'description' => 'The name of the user'
            ],
            'updated_at' => [
                'type' => Type::string(),
                'description' => 'Apellido materno del Cliente'
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