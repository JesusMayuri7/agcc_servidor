<?php

namespace App\GraphQL\Query;

use App\Http\Models\Empleado;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
class EmpleadoQuery extends Query
{
    protected $attributes = [
        'name' => 'Empleado Query',
        'description' => 'A query of users'
    ];
    public function type()
    {
        // result of query with pagination laravel
        return GraphQL::paginate('empleadoType');
    }
    
    // arguments to filter query
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'dni' => [
                'name' => 'dni',
                'type' => Type::string()
            ],
            'nombres' => [
                'name' => 'nombres',
                'type' => Type::string()
            ],
            'apellido_paterno' => [
                'name' => 'apellido_paterno',
                'type' => Type::string()
            ],
            'apellido_materno' => [
                'name' => 'apellido_materno',
                'type' => Type::string()
            ],
            'usuario' => [
                'name' => 'usuario',
                'type' => Type::string()
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::string()
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
            'refresh_token' => [
                'name' => 'refresh_token',
                'type' => Type::string()
            ],
            'email' => [
                'name' => 'email',
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
            if (isset($args['dni'])) {
                $query->where('dni','LIKE','%'.$args['dni'].'%');
            }
        };

        $user = Empleado::with(array_keys($fields->getRelations()))
            ->where($where)
            ->select($fields->getSelect())
            ->paginate($args['limit'] ?? 30, ['*'], 'page', $args['per_page'] ?? 0);
        return $user;
    }
}