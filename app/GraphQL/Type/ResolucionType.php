<?php

namespace App\GraphQL\Type;

use App\Http\Models\Resolucion;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ResolucionType extends GraphQLType
{
    protected $attributes = [
        'name' => 'resolucion',
        'description' => 'Tipo de Reolucion',
        'model' => Resolucion::class, // define model for users type
    ];
    
    // define field of type
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user'
            ],
            'nro_resolucion' => [
                'type' => Type::string(),
                'description' => 'The email of user'
            ],
            'estado' => [
                'type' => Type::string(),
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
            'solicitud_id'=>[
                'type' => Type::int(),
                'description' => 'solicitud_id'
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