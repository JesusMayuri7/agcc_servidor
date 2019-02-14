<?php

namespace App\GraphQL\Query;

use App\Http\Models\Auditoria;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
class AuditoriaQuery extends Query
{
    protected $attributes = [
        'name' => 'auditoria Query',
        'description' => 'A query of users'
    ];
    public function type()
    {
        // result of query with pagination laravel
        return GraphQL::paginate('auditoriaType');
    }
    
    // arguments to filter query
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'tabla' => [
                'name' => 'tabla',
                'type' => Type::string()
            ],
            'campo_old' => [
                'name' => 'tipo',
                'type' => Type::string()
            ],
            'campo_new' =>[
                'name' => 'campo_new',
                'type' => Type::string()
            ],
            'empleado_id'=>[
                'name' => 'empleado_id',
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
            if (isset($args['tabla'])) {
                $query->where('tabla','LIKE','%'.$args['tabla'].'%');
            }
        };

        $user = Auditoria::with(array_keys($fields->getRelations()))
            ->where($where)
            ->select($fields->getSelect())
            ->paginate($args['limit'] ?? 30, ['*'], 'page', $args['per_page'] ?? 0);
        return $user;
    }
}