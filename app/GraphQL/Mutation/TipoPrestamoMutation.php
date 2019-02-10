<?php

namespace App\GraphQL\Mutation;

use App\Http\Models\TipoPrestamo;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class TipoPrestamoMutation extends Mutation
{
    protected $attributes = [
        'name' => 'tipo_prestamo'
    ];
    public function type()
    {
        return GraphQL::type('tipo_prestamoType');
    }
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
            'activo' => [
                'name' => 'activo',
                'type' => Type::int()
            ]
            
            
        ];
    }
    public function resolve($root, $args)
    {
        //$args['password'] = bcrypt($args['password']);
        $user = TipoPrestamo::create($args);
        if (!$user) {
            return null;
        }
        //$user->user_profiles()->create($args);
        return $user;
    }
}