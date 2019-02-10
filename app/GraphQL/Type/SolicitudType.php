<?php

namespace App\GraphQL\Type;

use App\Http\Models\Solicitud;
use App\Http\Models\Cliente;
use App\Http\Models\Empleado;

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
            'reporte_ceop_id' => [
                'type' => Type::int(),
                'description' => 'The plazo of the user'
            ],
            'historial_crediticio_id' => [
                'type' => Type::int(),
                'description' => 'The plazo of the user'
            ],
            'giro_negocio_id' => [
                'type' => Type::int(),
                'description' => 'The plazo of the user'
            ],
            'garantia_id' => [
                'type' => Type::int(),
                'description' => 'The plazo of the user'
            ],
            'perfil_cliente_tipo_producto_id' => [
                'type' => Type::int(),
                'description' => 'The plazo of the user'
            ],
            'tipo_prestamo_id' => [
                'type' => Type::int(),
                'description' => 'The plazo of the user'
            ],
            // field relation to model user_profiles
            'empleado' => [
                'type' => GraphQL::type('empleadoType'),
                'description' => 'The profile of the user'
            ]
        ];
    }
    protected function resolveNombresField($root, $args)
    {
        return strtolower($root->nombres);
    }
}