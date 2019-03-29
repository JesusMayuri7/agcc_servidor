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
            'tipo_interes' => [
                'type' => Type::string(),
                'description' => 'The email of user'
            ],
            'ahorro_inicial' => [
                'type' => Type::float(),
                'description' => 'The email of user'
            ],
            'ahorro_programado' => [
                'type' => Type::float(),
                'description' => 'The email of user'
            ],
            'comentario' => [
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
            ],
            'monto'=>[
                'type' => Type::float(),
                'description' => 'solicitud_id'
            ],
            'interes'=>[
                'type' => Type::float(),
                'description' => 'solicitud_id'
            ],
            'cliente_full_name' => [
                'type' => Type::string(),
              //  'always' => ['full_name'],
                'description' => 'The profile of the user',
                'resolve' => function ($root) { // As a workaround
                    return $root->solicitud['cliente']['full_name'];
                    },
            'selectable'=>false
            ],
            'empleado_full_name' => [
                'type' => Type::string(),
              //  'always' => ['full_name'],
                'description' => 'The profile of the user',
                'resolve' => function ($root) { // As a workaround
                    return $root->solicitud['empleado']['full_name'];
                    },
            'selectable'=>false
            ],
            'monto_solicitado' => [
                'type' => Type::string(),
              //  'always' => ['full_name'],
                'description' => 'The profile of the user',
                'resolve' => function ($root) { // As a workaround
                    return $root->solicitud['monto'];
                    },
            'selectable'=>false
                ],
            'cuota' => [
                    'type' => Type::string(),
                  //  'always' => ['full_name'],
                    'description' => 'The profile of the user',
                    'resolve' => function ($root) { // As a workaround
                        return $root->solicitud['cuota'];
                        },
            'selectable'=>false
                    ],
            'plazo_maximo' => [
                        'type' => Type::int(),
                      //  'always' => ['full_name'],
                        'description' => 'The profile of the user',
                        'resolve' => function ($root) { // As a workaround
                            return $root->solicitud->perfilclientetipoproducto['tipoProducto']['plazo_maximo'];
                            },
                'selectable'=>false
                        ],
            'plazo' => [
                        'type' => Type::string(),
                      //  'always' => ['full_name'],
                        'description' => 'The profile of the user',
                        'resolve' => function ($root) { // As a workaround
                            return $root->solicitud['plazo'];
                            },
                    'selectable'=>false
            ]
        ];
    }
}