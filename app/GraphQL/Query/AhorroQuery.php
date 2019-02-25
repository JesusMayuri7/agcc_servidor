<?php

namespace App\GraphQL\Query;

use App\Http\Models\Ahorro;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
class AhorroQuery extends Query
{
    protected $attributes = [
        'name' => 'ahorro Query',
        'description' => 'A query of users'
    ];
    public function type()
    {
        // result of query with pagination laravel
        return GraphQL::paginate('ahorroType');
    }
    
    // arguments to filter query
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'desc_ahorro' => [
                'name' => 'desc_ahorro',
                'type' => Type::string()
            ],
            'porcentaje' => [
                'name' => 'porcentaje',
                'type' => Type::float()
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
            if (isset($args['desc_ahorro'])) {
                $query->where('desc_ahorro','LIKE','%'.$args['desc_ahorro'].'%');
            }
        };

        $user = Ahorro::with(array_keys($fields->getRelations()))
            ->where($where)
            ->select($fields->getSelect())
            ->paginate($args['limit'] ?? 30, ['*'], 'page', $args['per_page'] ?? 0);
        return $user;
    }
}