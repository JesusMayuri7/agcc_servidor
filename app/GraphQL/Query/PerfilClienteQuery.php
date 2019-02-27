<?php

namespace App\GraphQL\Query;

use App\Http\Models\PerfilCliente;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
class PerfilClienteQuery extends Query
{
    protected $attributes = [
        'name' => 'perfil_clienteQuery',
        'description' => 'A query of users'
    ];
    public function type()
    {
        return GraphQL::paginate('perfil_clienteType');
    }
    
    // arguments to filter query
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'desc_perfil_cliente' => [
                'name' => 'desc_perfil_cliente',
                'type' => Type::string()
            ],
            'linea_credito_id' => [
                'name' => 'linea_credito_id',
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
           if (isset($args['desc_perfil_cliente'])) {
                $query->where('desc_perfil_cliente','LIKE','%'.$args['desc_perfil_cliente'].'%');
            }
        };

        $user = PerfilCliente::with(array_keys($fields->getRelations()))
            ->where($where)
            ->select($fields->getSelect())
            ->paginate($args['limit'] ?? 30, ['*'], 'page', $args['per_page'] ?? 0);
        return $user;         
        }
}