<?php
namespace App\GraphQL\Type;

use App\Http\Models\GiroNegocio;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class GiroNegocioType extends GraphQLType
{
    protected $attributes = [
        'name' => 'giro_negocio',
        'description' => 'Tipo de Giro Negocio',
        'model' => GiroNegocio::class, // define model for users type
    ];
    
    // define field of type
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user'
            ],
            'desc_giro_negocio' => [
                'type' => Type::string(),
                'description' => 'The email of user'
            ],
            'margen minimo' => [
                'type' => Type::float(),
                'description' => 'The name of the user'
            ],
            'margen_maximo' => [
                'type' => Type::float(),
                'description' => 'The name of the user'
            ],
            'activo' => [
                'type' => Type::int(),
                'description' => 'Apellido materno del Cliente'
            ],
            'created_at' => [
                'type' => Type::string(),
                'description' => 'Apellido materno del Cliente'
            ],
            'updated_at' => [
                'type' => Type::string(),
                'description' => 'Apellido materno del Cliente'
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