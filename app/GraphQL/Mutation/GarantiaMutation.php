<?php

namespace App\GraphQL\Mutation;

use App\Http\Models\Garantia;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class GarantiaMutation extends Mutation
{
    protected $attributes = [
        'name' => 'garantia'
    ];
    public function type()
    {
        return GraphQL::type('garantiaType');
    }
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'desc_garantia' => [
                'name' => 'desc_garantia',
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
        $user = Garantia::create($args);
        if (!$user) {
            return null;
        }
        //$user->user_profiles()->create($args);
        return $user;
    }
}