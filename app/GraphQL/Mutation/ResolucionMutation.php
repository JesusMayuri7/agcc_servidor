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
            'solicitud_id' => [
                'name' => 'solicitud_id',
                'type' => Type::int()
            ]
           
        ];
    }
    public function resolve($root, $args)
    {
        $args['nro_resolucion'] = Resolucion::max('id')+1;
        $user = Resolucion::create($args);
        if (!$user) {
            return null;
        }
        //$user->user_profiles()->create($args);
        return $user;
    }
}