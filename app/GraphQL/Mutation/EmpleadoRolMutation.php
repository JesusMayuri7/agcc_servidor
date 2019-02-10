<?php

namespace App\GraphQL\Mutation;

use App\Http\Models\Rol;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class EmpleadoRolMutation extends Mutation
{
    protected $attributes = [
        'name' => 'empleado_rol'
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
            'rol_id' => [
                'name' => 'rol_id',
                'type' => Type::int()
            ],
            'empleado_id' => [
                'name' => 'empleado_id',
                'type' => Type::int()
            ],
        ];
    }
    public function resolve($root, $args)
    {
        //$args['password'] = bcrypt($args['password']);
        $perfil = Rol::find($args['rol_id']);
        $perfil->empleado()->attach($args['empleado_id'],['desc_rol' =>$args['desc_rol'],'desc_rol' =>$args['desc_rol']]);
        if (!$perfil) {
            return null;
        }
        //$user->user_profiles()->create($args);
        return $perfil;
    }
}