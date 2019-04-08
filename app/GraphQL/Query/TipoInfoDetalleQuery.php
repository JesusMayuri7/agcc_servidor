<?php

namespace App\GraphQL\Query;

use App\Http\Models\TipoInfoDetalle;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
class TipoInfoDetalleQuery extends Query
{
    protected $attributes = [
        'name' => 'TipoInfoDetalle Query',
        'description' => 'A query of users'
    ];
    public function type()
    {
        // result of query with pagination laravel
        return GraphQL::paginate('tipo_info_detalleType');
    }
    
    // arguments to filter query
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'desc_tipo_info_detalle' => [
                'name' => 'desc_tipo_info_detalle',
                'type' => Type::string()
            ],
            'tipo_info_id' => [
                'name' => 'tipo_info_id',
                'type' => Type::int()
            ],
            'tipo' => [
                'name' => 'tipo',
                'type' => Type::string()
            ],
            'activo' =>[
                'name' => 'activo',
                'type' => Type::int()
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
            if (isset($args['desc_tipo_info_detalle'])) {
                $query->where('desc_tipo_info_detalle','LIKE','%'.$args['desc_tipo_info_detalle'].'%');
            }
        };

        $user = TipoInfoDetalle::with(array_keys($fields->getRelations()))
            ->where($where)
          //  ->select($fields->getSelect())
            ->paginate($args['limit'] ?? 50, ['*'], 'page', $args['per_page'] ?? 0);
        return $user;
    }
}