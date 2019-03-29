<?php

namespace App\GraphQL\Query;

use App\Http\Models\Solicitud;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class SolicitudQuery extends Query
{
    protected $attributes = [
        'name' => 'Solicitud Query',
        'description' => 'A query of users'
    ];
    public function type()
    {
        // result of query with pagination laravel
        return GraphQL::paginate('solicitudType');
    }
    
    // arguments to filter query
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'activo' => [
                'name' => 'activo',
                'type' => Type::int()
            ],
            'monto' => [
                'name' => 'monto',
                'type' => Type::float()
            ],
            'plazo' => [
                'name' => 'plazo',
                'type' => Type::int()
            ],
            'cuota' => [
                'name' => 'cuota',
                'type' => Type::float()
            ],
            'interes' => [
                'name' => 'interes',
                'type' => Type::float()
            ],
            'comentario' => [
                'name' => 'comentario',
                'type' => Type::string()
            ],
            'reporte_ceop' =>[
                'name' =>'reporte_ceop',
                'type' => Type::int(),
                'selectable'=>false
            ],
            'reporte_info_id' => [
                'name' => 'historial_crediticio_id',
                'type' => Type::int()
            ],
            'cliente_id' => [
                'name' => 'cliente_id',
                'type' => Type::int()
            ],
            'giro_negocio_id' => [
                'name' => 'giro_negocio_id',
                'type' => Type::int()
            ],
            'garantia_id' => [
                'name' => 'garantia_id',
                'type' => Type::int()
            ],
            'aprobada' => [
                'name' => 'aprobada',
                'type' => Type::int()
            ],
            'fecha_aprobacion' => [
                'name' => 'fecha_aprobacion',
                'type' => Type::string()
            ],
            'desembolso' => [
                'name' => 'desembolso',
                'type' => Type::int()
            ],
            'fecha_desembolso' => [
                'name' => 'fecha_desembolso',
                'type' => Type::string()
            ],
            'empleado_id' => [
                'name' => 'empleado_id',
                'type' => Type::int()
            ],
            'garantia_id' => [
                'name' => 'garantia_id',
                'type' => Type::int()
            ],
            'tipo_producto' => [
                'name' => 'tipo_producto',
                'type' => Type::string()
            ],
            'tipo_producto_id' => [
                'name' => 'tipo_producto_id',
                'type' => Type::int()
            ],
            'tipo_prestamo_id' => [
                'name' => 'tipo_prestamo_id',
                'type' => Type::int()
            ],
            'nro_solicitud' => [
                'name' => 'nro_solicitud',
                'type' => Type::string()
            ],
            'estado' => [
                'name' => 'estado',
                'type' => Type::string()
            ],
            'ahorro_inicial' => [
                'name' => 'ahorro_inicial',
                'type' => Type::float()
            ],
            'ahorro_programado' => [
                'name' => 'ahorro_programado',
                'type' => Type::float()
            ],
            'tipo_interes' => [
                'name' => 'tipo_interes',
                'type' => Type::string()
            ],
            'created_at' => [
                'name' => 'created_at',
                'type' => Type::string()
            ],
            'updated_at' => [
                'name' => 'updated_at',
                'type' => Type::string()
            ],
            'limit' => [
                'type' => Type::int(),
                'description' => 'Limit the items per page',
            ],
            'per_page' => [
                'type' => Type::int(),
                'description' => 'Display a specific page',
            ],
        ];
    }
    public function resolve($root, $args, SelectFields $fields)
    {
        $where = function ($query) use ($args) {
            if (isset($args['id'])) {
                $query->where('id',$args['id']);
            }
            if (isset($args['nro_solicitud'])) {
                $query->where('nro_solicitud','LIKE','%'.$args['nro_solicitud'].'%');
            }
        };
        $user = Solicitud::with(array_keys($fields->getRelations()))
        ->where($where)
        //->select($fields->getSelect())
        ->orderBy('created_at', 'desc')
        ->paginate($args['limit'] ?? 30, ['*'], 'page', $args['per_page'] ?? 0);
        return $user;    
       // dd($fields);
    }
}