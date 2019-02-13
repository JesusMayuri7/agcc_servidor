<?php

namespace App\GraphQL\Query;

use App\Http\Models\GiroNegocio;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
class GiroNegocioQuery extends Query
{
    protected $attributes = [
        'name' => 'GiroNegocio Query',
        'description' => 'A query of users'
    ];
    public function type()
    {
        // result of query with pagination laravel
        return GraphQL::paginate('giro_negocioType');
    }
    
    // arguments to filter query
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'desc_giro_negocio' => [
                'name' => 'desc_giro_negocio',
                'type' => Type::string()
            ],
            'margen_minimo' => [
                'name' => 'margen_minimo',
                'type' => Type::float()
            ],
            'margen_maximo' => [
                'name' => 'margen_maximo',
                'type' => Type::float()
            ],
            'activo' => [
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
            if (isset($args['desc_giro_negocio'])) {
                $query->where('desc_giro_negocio','LIKE','%'.$args['desc_giro_negocio'].'%');
            }
        };

        $user = GiroNegocio::with(array_keys($fields->getRelations()))
            ->where($where)
            ->select($fields->getSelect())
            ->paginate($args['limit'] ?? 30, ['*'], 'page', $args['per_page'] ?? 0);
        return $user;
    }
}