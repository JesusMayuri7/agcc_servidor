<?php

namespace App\GraphQL\Query;

use App\Http\Models\PermisoModulo;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
class PermisoModuloQuery extends Query
{
    protected $attributes = [
        'name' => 'permiso_modulo Query',
        'description' => 'A query of users'
    ];
    public function type()
    {
        // result of query with pagination laravel
        return GraphQL::paginate('permiso_moduloType');
    }
    
    // arguments to filter query
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'permiso_id' =>[
                'name' => 'permiso_id',
                'type' => Type::int()
            ],
            'menu_id' =>[
                'name' => 'menu_id',
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

        $user = PermisoModulo::with(array_keys($fields->getRelations()))
            ->where($where)
            ->select($fields->getSelect())
            ->paginate();
        return $user;
    }
}