<?php

namespace App\GraphQL\Mutation;

use App\Http\Models\LineaCredito;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class LineaCreditoMutation extends Mutation
{
    protected $attributes = [
        'name' => 'linea_credito'
    ];
    public function type()
    {
        return GraphQL::type('linea_creditoType');
    }
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'desc_linea_credito' => [
                'name' => 'desc_linea_credito',
                'type' => Type::string()
            ],
            'tipo_interes' =>[
                'name' => 'tipo_interes',
                'type' => Type::string()
            ],
            'monto_minimo' => [
                'name' => 'monto_minimo',
                'type' => Type::float()
            ],
            'monto_maximo' => [
                'name' => 'monto_maximo',
                'type' => Type::float()
            ],
            'activo' => [
                'name' => 'activo',
                'type' => Type::int()
            ]

            
        ];
    }
    public function resolve($root, $args)
    {
        $where = function ($query) use ($args) {
            if (isset($args['id'])) {
                $query->where('id',$args['id']);
            }
            if (isset($args['desc_linea_credito'])) {
                $query->where('desc_linea_credito','LIKE','%'.$args['desc_linea_credito'].'%');
            }

        };
        if (isset($args['id'])) {
           $user = LineaCredito::find($args['id']);
           if (!$user) {
            return null;
            }
           $user->update($args); 
           return $user;
        }
        else {
            $user = LineaCredito::create($args);
            if (!$user) {
                return null;
            }
            return $user;
        }


    }
}