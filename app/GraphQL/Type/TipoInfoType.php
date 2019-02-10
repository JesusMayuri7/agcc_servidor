<?php

namespace App\GraphQL\Type;

use App\Http\Models\TipoInfo;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class TipoInfoType extends GraphQLType
{
    protected $attributes = [
        'name' => 'tipo_info',
        'description' => 'tipo_info',
        'model' => TipoInfo::class, // define model for users type
    ];
    
    // define field of type
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user'
            ],
            'desc_tipo_info' => [
                'type' => Type::string(),
                'description' => 'The desc_tipo_info of user'
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