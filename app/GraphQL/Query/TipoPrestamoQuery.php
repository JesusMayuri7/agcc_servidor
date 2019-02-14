<?php

namespace App\GraphQL\Query;

use App\Http\Models\TipoPrestamo;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
class TipoPrestamoQuery extends Query
{
    protected $attributes = [
        'name' => 'Resolucion Query',
        'description' => 'A query of users'
    ];
    public function type()
    {
        // result of query with pagination laravel
        return GraphQL::paginate('tipo_prestamoType');
    }
    
    // arguments to filter query
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'desc_tipo_prestamo' => [
                'name' => 'desc_tipo_prestamo',
                'type' => Type::string()
            ],
            'detalle' => [
                'name' => 'detalle',
                'type' => Type::string()
            ],
            'activo'=> [
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
            if (isset($args['desc_tipo_prestamo'])) {
                $query->where('desc_tipo_prestamo','LIKE','%'.$args['desc_tipo_prestamo'].'%');
            }
        };

        $user = TipoPrestamo::with(array_keys($fields->getRelations()))
            ->where($where)
            ->select($fields->getSelect())
            ->paginate($args['limit'] ?? 30, ['*'], 'page', $args['per_page'] ?? 0);
        return $user;
    }
}