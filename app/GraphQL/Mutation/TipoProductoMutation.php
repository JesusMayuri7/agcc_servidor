<?php

namespace App\GraphQL\Mutation;

use App\Http\Models\TipoProducto;
use GraphQL\Type\Definition\InputObjectType;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class TipoProductoMutation extends Mutation
{
    protected $attributes = [
        'name' => 'tipo_producto'
    ];
    public function type()
    {
        return GraphQL::type('tipo_productoType');
    }
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'desc_tipo_producto' => [
                'name' => 'desc_tipo_producto',
                'type' => Type::string()
            ],
            'interes' =>[
                'name' => 'interes',
                'type' => Type::float()
            ],
            'mora' => [
                'name' => 'mora',
                'type' => Type::float()
            ],
            'plazo_minimo' => [
                'name' => 'plazo_minimo',
                'type' => Type::int()
            ],
            'plazo_maximo'=>[
                'name' => 'plazo_maximo',
                'type' => Type::int()
            ],
            'activo'=>[
                'name' => 'activo',
                'type' => Type::int()
            ],
            'perfil_cliente' => [
                'type' => Type::listOf(new InputObjectType([
                    'name' => 'PerfilClienteInputObjectType',
                    'fields' => [
                        'perfil_cliente_id' => [
                            'type' => Type::int(),
                            'description' => 'The id of the subject'
                        ],
                        'tipo_producto_id' => [
                            'type' => Type::int(),
                            'description' => 'The name of the subject'
                        ]
                    ]
                ])),                   
                'description' => 'The profile of the user'
           ],
        ];
    }
    public function resolve($root, $args)
    {
     
        $where = function ($query) use ($args) {
            if (isset($args['id'])) {
                $query->where('id',$args['id']);
            }
            if (isset($args['desc_tipo_producto'])) {
                $query->where('desc_tipo_producto','LIKE','%'.$args['desc_tipo_producto'].'%');
            }

        };
       // dd($args);
        if (isset($args['id'])) {
           $producto = TipoProducto::find($args['id']);
           if (!$producto) {
            return null;
            }
           $producto->update($args); 
           if (isset($args['perfil_cliente'])) {
          
            $producto->perfil_cliente()->detach();
            $perfil=[];
            foreach ($args['perfil_cliente'] as $item) {
                    array_push($perfil,array('perfil_cliente_id'=>$item['perfil_cliente_id'],'tipo_producto_id'=>$item['tipo_producto_id']));
            };
            //dd($perfil);
            $producto->perfil_cliente()->attach($perfil);
            }
           return $producto;
        }
        else {
            $producto = TipoProducto::create($args);
            if (!$producto) {
                return null;
            }
            if (isset($args['perfil_cliente'])) {
          
                $producto->perfil_cliente()->detach();
                $perfil=[];
                foreach ($args['perfil_cliente'] as $item) {
                        array_push($perfil,array('perfil_cliente_id'=>$item['perfil_cliente_id'],'tipo_producto_id'=>$producto->id));
                };
                //dd($perfil);
                $producto->perfil_cliente()->attach($perfil);
                }
            return $producto;
        }

    }
}