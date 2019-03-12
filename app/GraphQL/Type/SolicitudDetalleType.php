<?php

namespace App\GraphQL\Type;

use App\Http\Models\solicitudDetalle;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class SolicitudDetalleType extends GraphQLType
{
    protected $attributes = [
        'name' => 'solicitud_detalle',
        'description' => 'Tipo de solicitud_detalle',
        'model' => SolicitudDetalle::class, // define model for users type
    ];
    
    // define field of type
    public function fields()
    {
        return [
            
            'monto' => [
                'type' => Type::float(),
                'description' => 'The email of user'
            ],
            'tipo_info_detalle_id' => [
                'type' => Type::int(),
                'description' => 'The email of user'
            ],
            'solicitud_id' => [
                'type' => Type::int(),
                'description' => 'The email of user'
            ],
            // field relation to model user_profiles
           /* 'user_profiles' => [
                'type' => GraphQL::type('user_profiles'),
                'description' => 'The profile of the user'
            ]*/
        ];
    }
}