<?php

namespace App\GraphQL\Mutation;

use App\Http\Models\Menu;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class MenuMutation extends Mutation
{
    protected $attributes = [
        'name' => 'menu'
    ];
    public function type()
    {
        return GraphQL::type('menuType');
    }
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'desc_menu' => [
                'name' => 'desc_menu',
                'type' => Type::string()
            ],
            'detalle' =>[
                'name' => 'detalle',
                'type' => Type::string()
            ],
            'tipo' => [
                'name' => 'tipo',
                'type' => Type::string()
            ]
            
            
        ];
    }
    public function resolve($root, $args)
    {
        //$args['password'] = bcrypt($args['password']);
        $user = Menu::create($args);
        if (!$user) {
            return null;
        }
        //$user->user_profiles()->create($args);
        return $user;
    }
}