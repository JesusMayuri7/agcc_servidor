<?php

namespace App\GraphQL\Type;

use App\Http\Models\Cliente;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ClienteType extends GraphQLType
{
    protected $attributes = [
        'name' => 'cliente',
        'description' => 'Tipo de Cliente',
        'model' => Cliente::class, // define model for users type
    ];
    
    // define field of type
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'The id of the user'
            ],
            'dni' => [
                'type' => Type::string(),
                'description' => 'The dni of user'
            ],
            'nombres' => [
                'type' => Type::string(),
                'description' => 'The nombres of the user'
            ],
            'apellido_paterno' => [
                'type' => Type::string(),
                'description' => 'The name of the user'
            ],
            'apellido_materno' => [
                'type' => Type::string(),
                'description' => 'Apellido materno del Cliente'
            ],
            'full_name' => [
                'type' => Type::string(),
                'description' => 'The profile of the user',
                'selectable'=> false,
            ],
            'fecha_nacimiento' =>[
                'type' => Type::string(),
                'description' => 'fecha_nacimiento'
            ],
            'activo' =>[
                'type' => Type::int(),
                'name' => 'activo'
            ],
            'created_at' =>[
                'type' => Type::string(),
                'name' => 'created_at'
            ],
            'updated_at' =>[
                'type' => Type::string(),
                'name' => 'updated_at'
            ],
            'direccion' =>[
                'type' => Type::string(),
                'name' => 'direccion'
            ],
            'telefono' =>[
                'type' => Type::int(),
                'name' => 'telefono'
            ],
            'tipo' => [
                'type' => Type::string(),
                'description' => 'The profile of the user',
                'resolve' => function (Cliente $group) {
                    return $group->pivot->tipo;
                    },
            ],
            'activo' =>[
                'type' => Type::int(),
                'name' => 'activo'
            ],
        ];
    }
    protected function resolveFullNameField($root, $args)
    {
        return strtoupper($root->nombres.' '.$root->apellido_paterno.' '.$root->apellido_materno);
    }

}