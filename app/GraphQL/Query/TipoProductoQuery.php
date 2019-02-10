<?php

namespace App\GraphQL\Query;

use App\Http\Models\TipoProducto;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
class TipoProductoQuery extends Query
{
    protected $attributes = [
        'name' => 'tipo_producto Query',
        'description' => 'A query of users'
    ];
    public function type()
    {
        // result of query with pagination laravel
        return GraphQL::paginate('tipo_productoType');
    }
    
    // arguments to filter query
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'desc_tipo_producto' => [
                'name' => 'desc_tipo_producto',
                'type' => Type::string()
            ],
            'interes' => [
                'name' => 'interes',
                'type' => Type::float()
            ],
            'mora' =>[
                'name' => 'mora',
                'type' => Type::float()
            ],
            'plazo_minimo' => [
                'name' => 'plazo_minimo',
                'type' => Type::int()
            ],
            'plazo_maximo' =>[
                'name' => 'plazo_maximo',
                'type' => Type::int()
            ],
            'activo' => [
                'name' => 'activo',
                'type' => Type::int(),
            ],
            'per_page' => [
                'name' => 'per_page',
                'type' => Type::int(),
                'description' => 'Display a specific page',
            ],
            'total' => [
                'name' => 'total',
                'type' => Type::int(),
                'description' => 'Display a specific page',
            ],
            'limit' => [
                    'name' => 'limit',
                    'type' => Type::int(),
                    'description' => 'Limit the items per page',
            ],
        ];
    }
    public function resolve($root, $args, SelectFields $fields)
    {
        $where = function ($query) use ($args) {
            if (isset($args['id'])) {
                $query->where('id',$args['id']);
            }
            if (isset($args['desc_tipo_producto'])) {
                $query->where('desc_tipo_producto','LIKE','%'.$args['desc_tipo_producto'].'%');
            }
        };

        $user = TipoProducto::with(array_keys($fields->getRelations()))
            ->where($where)
            ->select($fields->getSelect())
            ->paginate($args['limit'] ?? 30, ['*'], 'page', $args['per_page'] ?? 0);
        return $user;
    }
}