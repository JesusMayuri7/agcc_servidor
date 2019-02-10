<?php

namespace App\GraphQL\Mutation;

use App\Http\Models\Ahorro;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class AhorroMutation extends Mutation
{
    protected $attributes = [
        'name' => 'ahorro'
    ];
    public function type()
    {
        return GraphQL::type('ahorroType');
    }
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'desc_ahorro' => [
                'name' => 'desc_ahorro',
                'type' => Type::float()
            ],
            'porcentaje' =>[
                'name' => 'porcentaje',
                'type' => Type::float()
            ]
            
            
        ];
    }
    public function resolve($root, $args)
    {
        //$args['password'] = bcrypt($args['password']);
        $user = Ahorro::create($args);
        if (!$user) {
            return null;
        }
        //$user->user_profiles()->create($args);
        return $user;
    }
}