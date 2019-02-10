<?php

namespace App\GraphQL\Mutation;

use App\Http\Models\Permiso;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class PermisoMutation extends Mutation
{
    protected $attributes = [
        'name' => 'permiso'
    ];
    public function type()
    {
        return GraphQL::type('permisoType');
    }
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'desc_permiso' => [
                'name' => 'desc_permiso',
                'type' => Type::string()
            ]
            
            
        ];
    }
    public function resolve($root, $args)
    {
        //$args['password'] = bcrypt($args['password']);
        $user = Permiso::create($args);
        if (!$user) {
            return null;
        }
        //$user->user_profiles()->create($args);
        return $user;
    }
}