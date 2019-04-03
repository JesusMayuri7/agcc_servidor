<?php

namespace App\GraphQL\Mutation;

use App\Http\Models\Resolucion;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class ResolucionMutation extends Mutation
{
    protected $attributes = [
        'name' => 'resolucion'
    ];
    public function type()
    {
        return GraphQL::type('resolucionType');
    }
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'nro_resolucion' => [
                'name' => 'nro_resolucion',
                'type' => Type::string()
            ],
            'estado' => [
                'name' => 'estado',
                'type' => Type::string()
            ],
            'comentario' => [
                'name' => 'comentario',
                'type' => Type::string()
            ],
            'solicitud_id' => [
                'name' => 'solicitud_id',
                'type' => Type::int()
            ],
            'ahorro_inicial' => [
                'name' => 'ahorro_inicial',
                'type' => Type::float()
            ],
            'ahorro_programado' => [
                'name' => 'ahorro_programado',
                'type' => Type::float()
            ],
            'tipo_interes' => [
                'name' => 'tipo_interes',
                'type' => Type::string()
            ],
            'interes' => [
                'name' => 'interes',
                'type' => Type::float()
            ],
            'monto' => [
                'name' => 'monto',
                'type' => Type::float()
            ],
            'plazo' => [
                'name' => 'plazo',
                'type' => Type::int()
            ],
        ];
    }
    public function resolve($root, $args)
    {

           //    dd($args);
            $where = function ($query) use ($args) {
                if (isset($args['id'])) {
                    $query->where('id',$args['id']);
                }
                if (isset($args['desc_linea_credito'])) {
                    $query->where('desc_linea_credito','LIKE','%'.$args['desc_linea_credito'].'%');
                }

            };
            if (isset($args['id'])) {
            $user = Resolucion::find($args['id']);
            if (!$user) {
                return null;
                }
            $user->update($args);                 
            return $user;
            }
            else {
                $args['nro_resolucion'] = Resolucion::max('nro_resolucion')+1;
                $user = Resolucion::create($args);
                if (!$user) {
                    return null;
                }
            return $user;
            }
    }
}