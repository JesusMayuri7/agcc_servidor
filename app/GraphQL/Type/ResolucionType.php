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
            'plazo'=>[
                'type' => Type::int(),
                'description' => 'plazo'
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
            'cliente_dni' => [
                'type' => Type::string(),
              //  'always' => ['full_name'],
                'description' => 'The profile of the user',
                'resolve' => function ($root) { // As a workaround
                    return $root->solicitud['cliente']['dni'];
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
            'cuota_solicitado' => [
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
            'plazo_solicitado' => [
                        'type' => Type::string(),
                      //  'always' => ['full_name'],
                        'description' => 'The profile of the user',
                        'resolve' => function ($root) { // As a workaround
                            return $root->solicitud['plazo'];
                            },
                    'selectable'=>false
                        ],
            'nro_solicitud' => [
                            'type' => Type::string(),
                          //  'always' => ['full_name'],
                            'description' => 'The profile of the user',
                            'resolve' => function ($root) { // As a workaround
                                return $root->solicitud['nro_solicitud'];
                                },
                    'selectable'=>false
                            ],
                            'cuota'=>[
                                'type' => Type::float(),
                                'description' => 'solicitud_id'
                            ],
                            'cliente_direccion' => [
                                'type' => Type::string(),
                                'description' => 'The profile of the user',
                                'resolve' => function ($root) { // As a workaround
                                    return $root->solicitud->cliente['direccion'];
                                    },
                            'selectable'=>false
                            ],
                            'garantia' => [
                                'type' => Type::string(),
                                'description' => 'The profile of the user',
                                'resolve' => function ($root) { // As a workaround
                                    return $root->solicitud->garantias['desc_garantia'];
                                    },
                                'selectable'=>false
                                ],  
                                'tipo_prestamo' => [
                                    'type' => Type::string(),
                                    'description' => 'The profile of the user',
                                    'resolve' => function ($root) { // As a workaround
                                        return $root->solicitud->tipoPrestamo['desc_tipo_prestamo'];
                                        },
                                'selectable'=>false
                                ],   
                                'tipo_producto' => [
                                    'type' => Type::string(),
                                    'description' => 'The profile of the user',
                                    'resolve' => function ($root) { // As a workaround
                                        return $root->solicitud->perfilclientetipoproducto['tipoProducto']['desc_tipo_producto'];
                                        },
                                'selectable'=>false
                                ],   
                                'giro_negocio' => [
                                    'type' => Type::string(),
                                    'description' => 'The profile of the user',
                                    'resolve' => function ($root) { // As a workaround
                                        return $root->solicitud->giroNegocio['desc_giro_negocio'];
                                        },
                                'selectable'=>false
                                ],  
                                'avales' => [
                                    'type' => Type::listOf(GraphQL::type('clienteType')),
                                    'description' => 'The profile of the user',
                                    'resolve' => function ($root) { // As a workaround
                                        return $root->solicitud->avales;
                                        },
                                'selectable'=>false
                               ],  
                               'perfil_cliente' => [
                                'type' => Type::string(),
                                'description' => 'The profile of the user',
                                'resolve' => function ($root) { // As a workaround
                                    return $root->solicitud->perfilclientetipoproducto['perfilCliente']['desc_perfil_cliente'];
                                    },
                                'selectable'=>false
                            ],  
                            'reporte_info' => [
                                'type' => Type::string(),
                                'description' => 'The profile of the user',
                                'resolve' => function ($root) { // As a workaround
                                    return $root->solicitud->reporteCrediticio['desc_historial_crediticio'];
                                    },
                            'selectable'=>false
                            ],  
                            'reporte_ceop' => [
                                'type' => Type::string(),
                                'description' => 'The profile of the user',
                                'resolve' => function ($root) { // As a workaround
                                    return $root->solicitud->reporteCeop['desc_reporte_ceop'];
                                    },
                            'selectable'=>false
                            ],   
        ];
    }
}