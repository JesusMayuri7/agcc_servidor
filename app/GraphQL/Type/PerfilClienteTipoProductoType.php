<?php

namespace App\GraphQL\Type;

use App\Http\Models\PerfilClienteTipoProducto;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PerfilClienteTipoProductoType extends GraphQLType
{
    protected $attributes = [
        'name' => 'perfil_cliente_tipo_productoType',
        'description' => 'Tipo de perfil_cliente',
        'model' => PerfilClienteTipoProducto::class, // define model for users type
    ];
    
    // define field of type
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'The id of the user'
            ],
            'perfil_cliente_id' => [
                'type' => Type::int(),
                'description' => 'The email of user'
            ],
            'tipo_producto_id' => [
                'type' => Type::int(),
                'description' => 'linea_credito_id'
            ],
            'created_at' => [
                'name' => 'created_at',
                'type' => Type::string()
            ],
            'updated_at' => [
                'name' => 'updated_at',
                'type' => Type::string()
            ]
        ];
    }
}