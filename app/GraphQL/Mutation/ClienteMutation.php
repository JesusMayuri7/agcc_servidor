<?php

namespace App\GraphQL\Mutation;

use App\Http\Models\Cliente;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class ClienteMutation extends Mutation
{
    protected $attributes = [
        'name' => 'cliente'
    ];
    public function type()
    {
        return GraphQL::type('clienteType');
    }
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::string()
            ],
            'dni' => [
                'name' => 'dni',
                'type' => Type::nonNull(Type::string())
            ],
            'nombres' => [
                'name' => 'nombres',
                'type' => Type::nonNull(Type::string())
            ],
            'apellido_paterno' => [
                'name' => 'apellido_paterno',
                'type' => Type::nonNull(Type::string())
            ],
            'apellido_materno' => [
                'name' => 'apellido_materno',
                'type' => Type::string()
            ],
            'fecha_nacimiento' => [
                'name' => 'fecha_nacimiento',
                'type' => Type::string()
            ],
            'direccion' => [
                'name' => 'direccion',
                'type' => Type::string()
            ],
            'telefono' => [
                'name' => 'telefono',
                'type' => Type::string()
            ],
            'activo' => [
                'name' => 'activo',
                'type' => Type::int()
            ],
        ];
    }
    public function resolve($root, $args)
    {
        $where = function ($query) use ($args) {
            if (isset($args['id'])) {
                $query->where('id',$args['id']);
            }
            if (isset($args['dni'])) {
                $query->where('dni',$args['dni']);
            }

        };
        if (isset($args['id'])) {           
           $user = Cliente::find($args['id']);
           if (!$user) {
            return null;
            }
           $user->update($args); 
           return $user;
        }
        else {            
           // dd($args['password']);
            $user = Cliente::create($args);
            if (!$user) {
                return null;
            }
            return $user;
        }
    }
}