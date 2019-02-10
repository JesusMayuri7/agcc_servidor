<?php

namespace App\GraphQL\Mutation;

use App\Http\Models\TipoInfo;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class TipoInfoMutation extends Mutation
{
    protected $attributes = [
        'name' => 'tipo_info'
    ];
    public function type()
    {
        return GraphQL::type('tipo_infoType');
    }
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'desc_tipo_info' => [
                'name' => 'desc_tipo_info',
                'type' => Type::string()
            ],
            
            
        ];
    }
    public function resolve($root, $args)
    {
        //$args['password'] = bcrypt($args['password']);
        $user = TipoInfo::create($args);
        if (!$user) {
            return null;
        }
        //$user->user_profiles()->create($args);
        return $user;
    }
}