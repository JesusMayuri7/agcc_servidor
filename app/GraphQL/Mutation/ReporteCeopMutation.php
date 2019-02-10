<?php

namespace App\GraphQL\Mutation;

use App\Http\Models\ReporteCeop;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class ReporteCeopMutation extends Mutation
{
    protected $attributes = [
        'name' => 'reporte_ceop'
    ];
    public function type()
    {
        return GraphQL::type('reporte_ceopType');
    }
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'desc_reporte_ceop' => [
                'name' => 'desc_reporte_ceop',
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
        $user = ReporteCeop::create($args);
        if (!$user) {
            return null;
        }
        //$user->user_profiles()->create($args);
        return $user;
    }
}