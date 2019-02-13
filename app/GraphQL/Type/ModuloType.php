<?php

namespace App\GraphQL\Type;

use App\Http\Models\Modulo;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ModuloType extends GraphQLType
{
    protected $attributes = [
        'name' => 'modulo',
        'description' => 'Tipo de modulo',
        'model' => Modulo::class, // define model for users type
    ];
    
    // define field of type
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user'
            ],
            'desc_modulo' => [
                'type' => Type::string(),
                'description' => 'The desc_modulo of user'
            ],
            'detalle' => [
                'type' => Type::string(),
                'description' => 'The detalle of the user'
            ],
            'permiso_menu_id' => [
                'type' => Type::int(),
                'description' => 'The permiso_menu_id of the user'
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