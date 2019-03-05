<?php

namespace App\GraphQL\Type;

use App\Http\Models\Solicitud;
use App\Http\Models\Garantia;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class SolicitudType extends GraphQLType
{
    protected $attributes = [
        'name' => 'solicitud',
        'description' => 'Tipo de Cliente',
        'model' => Solicitud::class, // define model for users type
    ];
    
    // define field of type
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user'
            ],
            'activo' => [
                'type' => Type::int(),
                'description' => 'The activo of user'
            ],
            'monto' => [
                'type' => Type::float(),
                'description' => 'The monto of the user'
            ],
            'plazo' => [
                'type' => Type::int(),
                'description' => 'The plazo of the user'
            ],
            'cuota' => [
                'type' => Type::float(),
                'description' => 'cuota del Cliente'
            ],
            'interes' => [
                'type' => Type::float(),
                'description' => 'interes del Cliente'
            ],
            'comentario' => [
                'type' => Type::string(),
                'description' => 'comentario del Cliente'
            ],
            'nro_solicitud' => [
                'type' => Type::string(),
                'description' => 'Apellido materno del Cliente'
            ],
            'estado' => [
                'type' => Type::string(),
                'description' => 'Apellido materno del Cliente'
            ],
            'cliente_id' => [
                'type' => Type::int(),
                'description' => 'The plazo of the user'
            ],
            'cliente_full_name' => [
                'type' => Type::string(),
                'description' => 'The profile of the user',
                'resolve' => function ($root) { // As a workaround
                    return $root->cliente['full_name'];
                    }
            ],
            'cliente_dni' => [
                'type' => Type::string(),
                'description' => 'The profile of the user',
                'resolve' => function ($root) { // As a workaround
                    return $root->cliente['dni'];
                    }
            ],
            'empleado_id' => [
                'type' => Type::int(),
                'description' => 'The plazo of the user'
            ],
            'reporte_ceop' => [
                'type' => Type::string(),
                'description' => 'The profile of the user',
                'resolve' => function ($root) { // As a workaround
                    return $root->reporteCeop['desc_reporte_ceop'];
                    }
            ],
            'reporte_ceop_id' => [
                'type' => Type::string(),
                'description' => 'The profile of the user',
                'resolve' => function ($root) { // As a workaround
                    return $root->reporteCeop['id'];
                    }
            ],
            'reporte_info_id' => [
                'type' => Type::string(),
                'description' => 'The profile of the user',
                'resolve' => function ($root) { // As a workaround
                    return $root->reporteCrediticio['id'];
                    }
            ],
            'reporte_info' => [
                'type' => Type::string(),
                'description' => 'The profile of the user',
                'resolve' => function ($root) { // As a workaround
                    return $root->reporteCrediticio['desc_historial_crediticio'];
                    }
            ],
            'giro_negocio_id' => [
                'type' => Type::int(),
                'description' => 'The plazo of the user'
            ],
            'giro_negocio' => [
                'type' => Type::string(),
                'description' => 'The profile of the user',
                'resolve' => function ($root) { // As a workaround
                    return $root->giroNegocio['desc_giro_negocio'];
                    }
            ],
            'tipo_producto' => [
                'type' => Type::string(),
                'description' => 'The profile of the user',
                'resolve' => function ($root) { // As a workaround
                    return $root->perfilclientetipoproducto['tipoProducto']['desc_tipo_producto'];
                    }
            ],
            'tipo_producto_id' => [
                'type' => Type::string(),
                'description' => 'The profile of the user',
                'resolve' => function ($root) { // As a workaround
                    return $root->perfilclientetipoproducto['tipoProducto']['id'];
                    }
            ],
            'tipo_prestamo' => [
                'type' => Type::string(),
                'description' => 'The profile of the user',
                'resolve' => function ($root) { // As a workaround
                    return $root->tipoPrestamo['desc_tipo_prestamo'];
                    }
            ],
            'tipo_prestamo_id' => [
                'type' => Type::string(),
                'description' => 'The profile of the user',
                'resolve' => function ($root) { // As a workaround
                    return $root->tipoPrestamo['id'];
                    }
            ],
            // field relation to model user_profiles
            'empleado' => [
                'type' => Type::string(),
                'description' => 'The profile of the user',
                'resolve' => function ($root) { // As a workaround
                    return $root->empleado['nombres'];
                    }
            ],
           'avales' => [
                'type' => Type::listOf(GraphQL::type('clienteType')),
                'description' => 'The profile of the user'
           ],
           'garantia' => [
            'type' => Type::string(),
            'description' => 'The profile of the user',
            'resolve' => function ($root) { // As a workaround
                return $root->garantias['desc_garantia'];
                }
            ],
            'garantia_id' => [
                'type' => Type::int(),
                'description' => 'The plazo of the user'
            ],
            'perfil_cliente' => [
                'type' => Type::string(),
                'description' => 'The profile of the user',
                'resolve' => function ($root) { // As a workaround
                    return $root->perfilclientetipoproducto['perfilCliente']['desc_perfil_cliente'];
                    }
            ],
            'perfil_cliente_id' => [
                'type' => Type::string(),
                'description' => 'The profile of the user',
                'resolve' => function ($root) { // As a workaround
                    return $root->perfilclientetipoproducto['perfilCliente']['id'];
                    }
            ],
            'linea_credito' => [
                'type' => Type::string(),
                'description' => 'The profile of the user',
                'resolve' => function ($root) { // As a workaround
                    return $root->perfilclientetipoproducto['perfilCliente']['linea_credito']['desc_linea_credito'];
                    }
            ],
            'linea_credito_id' => [
                'type' => Type::string(),
                'description' => 'The profile of the user',
                'resolve' => function ($root) { // As a workaround
                    return $root->perfilclientetipoproducto['perfilCliente']['linea_credito']['id'];
                    }
            ],
        ];
    }
}