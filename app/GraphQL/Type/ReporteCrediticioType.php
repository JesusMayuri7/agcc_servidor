<?php

namespace App\GraphQL\Type;

use App\Http\Models\ReporteCrediticio;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ReporteCrediticioType extends GraphQLType
{
    protected $attributes = [
        'name' => 'reporte_crediticio',
        'description' => 'Tipo de reporte_crediticio',
        'model' => ReporteCrediticio::class, // define model for users type
    ];
    
    // define field of type
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user'
            ],
            'desc_historial_crediticio' => [
                'type' => Type::string(),
                'description' => 'The desc_historial_crediticio of user'
            ],
            'activo' => [
                'type' => Type::int(),
                'description' => 'The activo of the user'
            ],
            'created_at'=>[
                'type' => Type::string(),
                'description'  => 'created_at'
            ],
            'updated_at'=>[
                'type' => Type::string(),
                'description' => 'updated_at'
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