<?php

namespace App\GraphQL\Query;

use App\Http\Models\Avales;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
class AvalesQuery extends Query
{
    protected $attributes = [
        'name' => 'Avales Query',
        'description' => 'A query of users'
    ];
    public function type()
    {
        // result of query with pagination laravel
        return GraphQL::paginate('avalesType');
    }
    
    // arguments to filter query
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'cliente_id' => [
                'name' => 'cliente_id',
                'type' => Type::int()
            ],
            'tipo' => [
                'name' => 'tipo',
                'type' => Type::string()
            ]
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

        $user = Avales::with(array_keys($fields->getRelations()))
            ->where($where)
            ->select($fields->getSelect())
            ->paginate();
        return $user;
    }
}