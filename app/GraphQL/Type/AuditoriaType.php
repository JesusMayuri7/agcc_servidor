<?php

namespace App\GraphQL\Type;

use App\Http\Models\Auditoria;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class AuditoriaType extends GraphQLType
{
    protected $attributes = [
        'name' => 'auditoria',
        'description' => 'Tipo de auditoria',
        'model' => Auditoria::class, // define model for users type
    ];
    
    // define field of type
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user'
            ],
            'tabla' => [
                'type' => Type::string(),
                'description' => 'The tabla of user'
            ],
            'campo_old' => [
                'type' => Type::string(),
                'description' => 'The campo_old of the user'
            ],
            'created_at' => [
                'type' => Type::string(),
                'description' => 'The created_at of the user'
            ],
            'campo_new' => [
                'type' => Type::string(),
                'description' => 'campo_new'
            ],
            'empleado_id' =>[
                'type' => Type::int(),
                'description' => 'empleado_id'
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