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
        'name' => 'perfil_cliente Query',
        'description' => 'A query of users'
    ];
    public function type()
    {
        // result of query with pagination laravel
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
            ] ,
            'tipo_producto' => [
                'name' => 'tipo_producto',
                'type' => GraphQL::type('tipo_productoType')
            ],
            'linea_credito' => [
                'name' => 'linea_credito',
                'type' => GraphQL::type('linea_creditoType')
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

        $user = PerfilCliente::with(array_keys($fields->getRelations()))
            ->where($where)
            ->select($fields->getSelect())

            ->paginate();
        return $user;
    }
}