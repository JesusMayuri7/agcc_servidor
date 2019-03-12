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
            'tipo_info_id' => [
                'type' => Type::int(),
                'description' => 'The profile of the user'
            ],
            'tipo_info_detalle_id' => [
                'type' => Type::int(),
                'description' => 'The profile of the user',
                'resolve' => function ($root) { // As a workaround
                    return $root['pivot']['tipo_info_detalle_id'];
                    },
                'selectable' => false
            ],
            'tipo_info' => [
                'name' => 'tipo_info',
                'type' => Type::string(),
                'resolve' => function ($root) { // As a workaround
                    return $root->tipoInfo['desc_tipo_info'];
                    },
                'selectable' => false
            ],
            'informacion' => [
                'type' => Type::string(),
                'description' => 'The profile of the user',
                'resolve' => function ($root) { // As a workaround
                    return $root->tipoInfo['informacion'];
                    },
                   'selectable' => false   
            ],
            'monto' => [
                'type' => Type::float(),
                'description' => 'The profile of the user',
                'resolve' => function ($root) { // As a workaround
                    return $root['pivot']['monto'];
                    },
                   'selectable' => false   
            ],
            'solicitud_id' => [
                'type' => Type::int(),
                'description' => 'The profile of the user',
                'resolve' => function ($root) { // As a workaround
                    return $root['pivot']['solicitud_id'];
                    },
                   'selectable' => false   
            ],
        ];
    }
}