<?php

namespace App\GraphQL\Mutation;

use App\Http\Models\PerfilCliente;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class PerfilClienteTipoProductoMutation extends Mutation
{
    protected $attributes = [
        'name' => 'perfil_cliente_tipo_producto'
    ];
    public function type()
    {
        return GraphQL::type('perfil_clienteType');
    }
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::string()
            ],
            'desc_perfil_producto' => [
                'name' => 'desc_perfil_producto',
                'type' => Type::string()
            ],
            'activo' => [
                'name' => 'activo',
                'type' => Type::int()
            ],
            'detalle' => [
                'name' => 'detalle',
                'type' => Type::string()
            ],
            'perfil_cliente_id' => [
                'name' => 'perfil_cliente_id',
                'type' => Type::int()
            ],
            'tipo_producto_id' => [
                'name' => 'tipo_producto_id',
                'type' => Type::int()
            ],
        ];
    }
    public function resolve($root, $args)
    {
        //$args['password'] = bcrypt($args['password']);
        $perfil = PerfilCliente::find($args['perfil_cliente_id']);
        $perfil->tipo_producto()->attach($args['tipo_producto_id'],['detalle' =>$args['detalle'],'desc_perfil_producto' =>$args['desc_perfil_producto']]);
        if (!$perfil) {
            return null;
        }
        //$user->user_profiles()->create($args);
        return $perfil;
    }
}