<?php

namespace App\GraphQL\Mutation;

use App\Http\Models\ReporteCrediticio;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class ReporteCrediticioMutation extends Mutation
{
    protected $attributes = [
        'name' => 'reporte_crediticio'
    ];
    public function type()
    {
        return GraphQL::type('reporte_crediticioType');
    }
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'desc_historial_crediticio' => [
                'name' => 'desc_historial_crediticio',
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
        $user = ReporteCrediticio::create($args);
        if (!$user) {
            return null;
        }
        //$user->user_profiles()->create($args);
        return $user;
    }
}