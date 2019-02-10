<?php

namespace App\GraphQL\Mutation;

use App\Http\Models\Rol;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class RolMutation extends Mutation
{
    protected $attributes = [
        'name' => 'rol'
    ];
    public function type()
    {
        return GraphQL::type('rolType');
    }
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'desc_rol' => [
                'name' => 'desc_rol',
                'type' => Type::string()
            ],
            'detalle' =>[
                'name' => 'detalle',
                'type' => Type::string()
            ],
            

            
        ];
    }
    public function resolve($root, $args)
    {
        //$args['password'] = bcrypt($args['password']);
        $user = Rol::create($args);
        if (!$user) {
            return null;
        }
        //$user->user_profiles()->create($args);
        return $user;
    }
}