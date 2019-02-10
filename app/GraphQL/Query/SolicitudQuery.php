<?php

namespace App\GraphQL\Query;

use App\Http\Models\Solicitud;
use App\Http\Models\Cliente;

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
            'nro_solicitud' => [
                'name' => 'nro_solicitud',
                'type' => Type::string()
            ],
            'estado' => [
                'name' => 'estado',
                'type' => Type::string()
            ],
            'cliente_id' => [
                'name' => 'cliente_id',
                'type' => Type::int()
            ],
            'historial_crediticio_id' => [
                'name' => 'historial_crediticio_id',
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
            'perfil_cliente_tipo_producto_id' => [
                'name' => 'perfil_cliente_tipo_producto_id',
                'type' => Type::int()
            ],
            'tipo_prestamo_id' => [
                'name' => 'tipo_prestamo_id',
                'type' => Type::int()
            ],
            



        ];
    }
    public function resolve($root, $args, SelectFields $fields)
    {
        $where = function ($query) use ($args) {
            if (isset($args['id'])) {
                $query->where('id',$args['id']);
            }
            if (isset($args['dni'])) {
                $query->where('dni',$args['dni']);
            }
        };

        $user = Solicitud::with(array_keys($fields->getRelations()))
            ->where($where)
            ->select($fields->getSelect())
            ->paginate();
        return $user;
    }
}