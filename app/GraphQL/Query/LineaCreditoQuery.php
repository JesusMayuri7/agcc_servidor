<?php

namespace App\GraphQL\Query;

use App\Http\Models\LineaCredito;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
class LineaCreditoQuery extends Query
{
    protected $attributes = [
        'name' => 'linea_credito Query',
        'description' => 'A query of users'
    ];
    public function type()
    {
        // result of query with pagination laravel
        return GraphQL::paginate('linea_creditoType');
    }
    
    // arguments to filter query
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'desc_linea_credito' => [
                'name' => 'desc_linea_credito',
                'type' => Type::string()
            ],
            'tipo_interes' => [
                'name' => 'tipo_interes',
                'type' => Type::string()
            ],
            'monto_minimo' =>[
                'name' => 'monto_minimo',
                'type' => Type::float()
            ],
            'monto_maximo' =>[
                'name' => 'monto_maximo',
                'type' => Type::float()
            ],
            'activo' =>[
                'name' => 'activo',
                'type' => Type::int()
            ],
            'created_at' =>[
                'name' => 'created_at',
                'type' => Type::string()
            ],
            'updated_at' =>[
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
            ]
        ];
    }
    public function resolve($root, $args, SelectFields $fields)
    {
        $where = function ($query) use ($args) {
            if (isset($args['id'])) {
                $query->where('id',$args['id']);
            }
            if (isset($args['desc_linea_credito'])) {
                $query->where('desc_linea_credito','LIKE','%'.$args['desc_linea_credito'].'%');
            }

        };

        $user = LineaCredito::with(array_keys($fields->getRelations()))
            ->where($where)
            ->select($fields->getSelect())
            ->orderBy('created_at', 'desc')
            ->paginate($args['limit'] ?? 30, ['*'], 'page', $args['per_page'] ?? 0);
        return $user;
    }
}