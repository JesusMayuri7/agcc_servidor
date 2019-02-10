<?php

namespace App\GraphQL\Mutation;

use App\Http\Models\Solicitud;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class SolicitudMutation extends Mutation
{
    protected $attributes = [
        'name' => 'NewSolicitud'
    ];
    public function type()
    {
        return GraphQL::type('solicitudType');
    }
    public function args()
    {
        return [
            'id' => [
                'name'=>'id',
                'type' => Type::int(),
                'description' => 'The id of the user'
            ],
            'activo' => [
                'name'=>'activo',
                'type' => Type::nonNull(Type::int()),
                'description' => 'The activo of user'
            ],
            'monto' => [
                'name'=>'monto',
                'type' => Type::nonNull(Type::float()),
                'description' => 'The monto of the user'
            ],
            'plazo' => [
                'name'=>'plazo',
                'type' => Type::nonNull(Type::int()),
                'description' => 'The plazo of the user'
            ],
            'cuota' => [
                'name'=>'cuota',
                'type' => Type::nonNull(Type::float()),
                'description' => 'cuota del Cliente'
            ],
            'interes' => [
                'name'=>'interes',
                'type' => Type::nonNull(Type::float()),
                'description' => 'interes del Cliente'
            ],
            'comentario' => [
                'name'=>'comentario',
                'type' => Type::nonNull(Type::string()),
                'description' => 'comentario del Cliente'
            ],
            'nro_solicitud' => [
                'name'=>'nro_solicitud',
                'type' => Type::nonNull(Type::string()),
                'description' => 'Apellido materno del Cliente'
            ],
            'estado' => [
                'name'=>'estado',
                'type' => Type::nonNull(Type::string()),
                'description' => 'Apellido materno del Cliente'
            ],
            'cliente_id' => [
                'name'=>'cliente_id',
                'type' => Type::nonNull(Type::int()),
                'description' => 'The plazo of the user'
            ],
            'empleado_id' => [
                'name'=>'empleado_id',
                'type' => Type::nonNull(Type::int()),
                'description' => 'The plazo of the user'
            ],
            'reporte_ceop_id' => [
                'name'=>'reporte_ceop_id',
                'type' => Type::int(),
                'description' => 'The plazo of the user'
            ],
            'historial_crediticio_id' => [
                'name'=>'historial_crediticio_id',
                'type' => Type::int(),
                'description' => 'The plazo of the user'
            ],
            'giro_negocio_id' => [
                'name'=>'giro_negocio_id',
                'type' => Type::int(),
                'description' => 'The plazo of the user'
            ],
            'garantia_id' => [
                'name'=>'garantia_id',
                'type' => Type::int(),
                'description' => 'The plazo of the user'
            ],
            'perfil_cliente_tipo_producto_id' => [
                'name'=>'perfil_cliente_tipo_producto_id',
                'type' => Type::int(),
                'description' => 'The plazo of the user'
            ],
            'tipo_prestamo_id' => [
                'name'=>'tipo_prestamo_id',
                'type' => Type::int(),
                'description' => 'The plazo of the user'
            ],
        ];
    }
    public function resolve($root, $args)
    {
        //$args['password'] = bcrypt($args['password']);
        $user = Solicitud::create($args);
        if (!$user) {
            return null;
        }
        //$user->user_profiles()->create($args);
        return $user;
    }
}