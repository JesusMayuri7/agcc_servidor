<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\InputObjectType;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class TipoInfoDetalleInputObjectType extends InputObjectType
{
    protected $inputObject = true;
    
    protected $attributes = [
        'name' => 'tipoInfoDetalleInputObjectType',
        'description' => 'Tipo de Cliente',
    ];
    
    // define field of type
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'The id of the user'
            ],
            'solicitud_id' => [
                'type' => Type::int(),
                'description' => 'The id of the user'
            ],
            'tipo_info_detalle_id' => [
                'type' => Type::int(),
                'description' => 'The cliente_id of user'
            ],
            'monto' => [
                'type' => Type::float(),
                'description' => 'The tipo of user'
            ],
            
            // field relation to model user_profiles
           /* 'user_profiles' => [
                'type' => GraphQL::type('user_profiles'),
                'description' => 'The profile of the user'
            ]*/
        ];
    }
}