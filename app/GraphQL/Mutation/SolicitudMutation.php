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
                'type' =>  Type::int(),
                'description' => 'The activo of user'
            ],
            'monto' => [
                'name'=>'monto',
                'type' => Type::float(),
                'description' => 'The monto of the user'
            ],
            'plazo' => [
                'name'=>'plazo',
                'type' => Type::int(),
                'description' => 'The plazo of the user'
            ],
            'cuota' => [
                'name'=>'cuota',
                'type' => Type::float(),
                'description' => 'cuota del Cliente'
            ],
            'interes' => [
                'name'=>'interes',
                'type' => Type::float(),
                'description' => 'interes del Cliente'
            ],
            'comentario' => [
                'name'=>'comentario',
                'type' => Type::string(),
                'description' => 'comentario del Cliente'
            ],
            'nro_solicitud' => [
                'name'=>'nro_solicitud',
                'type' => Type::string(),
                'description' => 'Apellido materno del Cliente'
            ],
            'estado' => [
                'name'=>'estado',
                'type' => Type::string(),
                'description' => 'Apellido materno del Cliente'
            ],
            'cliente_id' => [
                'name'=>'cliente_id',
                'type' => Type::int(),
                'description' => 'The plazo of the user'
            ],
            'empleado_id' => [
                'name'=>'empleado_id',
                'type' => Type::int(),
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
        $where = function ($query) use ($args) {
            if (isset($args['id'])) {
                $query->where('id',$args['id']);
            }
            if (isset($args['desc_linea_credito'])) {
                $query->where('desc_linea_credito','LIKE','%'.$args['desc_linea_credito'].'%');
            }

        };
        if (isset($args['id'])) {
           $user = Solicitud::find($args['id']);
           if (!$user) {
            return null;
            }
           $user->update($args); 
           return $user;
        }
        else {
            $user = Solicitud::create($args);
            if (!$user) {
                return null;
            }
            return $user;
        }

    }
}