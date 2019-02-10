<?php

namespace App\GraphQL\Mutation;

use App\Http\Models\Auditoria;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class AuditoriaMutation extends Mutation
{
    protected $attributes = [
        'name' => 'auditoria'
    ];
    public function type()
    {
        return GraphQL::type('auditoriaType');
    }
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'tabla' => [
                'name' => 'tabla',
                'type' => Type::string()
            ],
            'campo_old' =>[
                'name' => 'campo_old',
                'type' => Type::string()
            ],
            'campo_new' => [
                'name' => 'campo_new',
                'type' => Type::string()
            ],
            'empleado_id' => [
                'name' => 'empleado_id',
                'type' => Type::int()
            ]
            
        ];
    }
    public function resolve($root, $args)
    {
        //$args['password'] = bcrypt($args['password']);
        $user = Auditoria::create($args);
        if (!$user) {
            return null;
        }
        //$user->user_profiles()->create($args);
        return $user;
    }
}