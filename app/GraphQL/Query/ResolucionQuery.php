<?php

namespace App\GraphQL\Query;

use App\Http\Models\Resolucion;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
class ResolucionQuery extends Query
{
    protected $attributes = [
        'name' => 'Resolucion Query',
        'description' => 'A query of users'
    ];
    public function type()
    {
        // result of query with pagination laravel
        return GraphQL::paginate('resolucionType');
    }
    
    // arguments to filter query
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'nro_resolucion' => [
                'name' => 'nro_resolucion',
                'type' => Type::string()
            ],
            'estado' => [
                'name' => 'estado',
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
            'solicitud_id' => [
                'name' => 'solicitud_id',
                'type' => Type::int()
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
            if (isset($args['nro_resolucion'])) {
                $query->where('nro_resolucion','LIKE','%'.$args['nro_resolucion'].'%');
            }
        };

        $user = Resolucion::with(array_keys($fields->getRelations()))
            ->where($where)
            ->select($fields->getSelect())
            ->paginate($args['limit'] ?? 30, ['*'], 'page', $args['per_page'] ?? 0);
        return $user;
    }
}