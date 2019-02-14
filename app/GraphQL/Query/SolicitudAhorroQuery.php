<?php

namespace App\GraphQL\Query;

use App\Http\Models\SolicitudAhorro;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
class SolicitudAhorroQuery extends Query
{
    protected $attributes = [
        'name' => 'solicitud_ahorro Query',
        'description' => 'A query of users'
    ];
    public function type()
    {
        // result of query with pagination laravel
        return GraphQL::paginate('solicitud_ahorroType');
    }
    
    // arguments to filter query
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'porcentaje' => [
                'name' => 'porcentaje',
                'type' => Type::float()
            ],
            'monto' => [
                'name' => 'monto',
                'type' => Type::float()
            ],
            'ahorro_id' => [
                'name' => 'ahorro_id',
                'type' =>Type::int()
            ],
            'solicitud_id' => [
                'name' => 'solicitud_id',
                'type' =>Type::int()
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
            if (isset($args['id'])) {
                $query->where('id','LIKE','%'.$args['id'].'%');
            }
        };

        $user = SolicitudAhorro::with(array_keys($fields->getRelations()))
            ->where($where)
            ->select($fields->getSelect())
            ->paginate($args['limit'] ?? 30, ['*'], 'page', $args['per_page'] ?? 0);
        return $user;
    }
}