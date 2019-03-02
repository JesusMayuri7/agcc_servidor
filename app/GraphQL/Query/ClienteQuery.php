<?php

namespace App\GraphQL\Query;

use App\Http\Models\Cliente;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
use Tymon\JWTAuth\Facades\JWTAuth;

class ClienteQuery extends Query
{
    private $auth;
    protected $attributes = [
        'name' => 'Cliente Query',
        'description' => 'A query of users'
    ];

    public function type()
    {
        // result of query with pagination laravel
        return GraphQL::paginate('clienteType');
    }
/*
    public function authorize(array $args)
    {
       try {
            $this->auth = JWTAuth::parseToken()->authenticate();
        } catch (\Exception $e) {
            $this->auth = null;
        }
        return (boolean) $this->auth;
    }
  */  
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
            'fecha_nacimiento' => [
                'name' => 'fecha_nacimiento',
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
            'direccion' => [
                'name' => 'direccion',
                'type' => Type::string()
            ],
            'telefono' => [
                'name' => 'telefono',
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
            if (isset($args['dni'])) {
                $query->where('dni',$args['dni']);
            }
        };

        $user = Cliente::with(array_keys($fields->getRelations()))
            ->where($where)
            ->select($fields->getSelect())
            ->paginate($args['limit'] ?? 30, ['*'], 'page', $args['per_page'] ?? 0);
        return $user;
    }
}