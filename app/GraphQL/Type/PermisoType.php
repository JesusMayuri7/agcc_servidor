<?php

namespace App\GraphQL\Type;

use App\Http\Models\Permiso;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PermisoType extends GraphQLType
{
    protected $attributes = [
        'name' => 'permiso',
        'description' => 'Tipo de permiso',
        'model' => Permiso::class, // define model for users type
    ];
    
    // define field of type
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user'
            ],
            'desc_permiso' => [
                'type' => Type::string(),
                'description' => 'The desc_permiso of user'
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