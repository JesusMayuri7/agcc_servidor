<?php

namespace App\GraphQL\Type;

use App\Http\Models\TipoInfoDetalle;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class TipoInfoDetalleType extends GraphQLType
{
    protected $attributes = [
        'name' => 'tipo_info_detalle',
        'description' => 'Tipo de tipo_info_detalle',
        'model' => TipoInfoDetalle::class, // define model for users type
    ];
    
    // define field of type
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user'
            ],
            'desc_tipo_info_detalle' => [
                'type' => Type::string(),
                'description' => 'The desc_tipo_info_detalle of user'
            ],
            'tipo' => [
                'type' => Type::string(),
                'description' => 'The tipo of the user'
            ],
            'activo' => [
                'type' => Type::int(),
                'description' => 'The activo of the user'
            ],
            'created_at' => [
                'type' => Type::string(),
                'description' => 'created_at'
            ],
            'updated_at' => [
                'type' => Type::string(),
                'description' => 'updated_at'
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