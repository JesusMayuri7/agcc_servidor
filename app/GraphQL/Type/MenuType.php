<?php

namespace App\GraphQL\Type;

use App\Http\Models\Menu;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class MenuType extends GraphQLType
{
    protected $attributes = [
        'name' => 'menu',
        'description' => 'Tipo de menu',
        'model' => Menu::class, // define model for users type
    ];
    
    // define field of type
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user'
            ],
            'desc_menu' => [
                'type' => Type::string(),
                'description' => 'The desc_menu of user'
            ],
            'detalle' => [
                'type' => Type::string(),
                'description' => 'The detalle of the user'
            ],
            'tipo' => [
                'type' => Type::string(),
                'description' => 'The tipo of the user'
            ],
            'created_at' => [
                'name' => 'created_at',
                'type' => Type::string()
            ],
            'updated_at' => [
                'name' => 'updated_at',
                'type' => Type::string()
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