<?php

namespace App\GraphQL\Query;

use App\Http\Models\SolicitudDetalle;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
class solicitudDetalleQuery extends Query
{
    protected $attributes = [
        'name' => 'SolicitudDetalle Query',
        'description' => 'A query of users'
    ];
    public function type()
    {
        // result of query with pagination laravel
        return GraphQL::paginate('solicitud_detalleType');
    }
    
    // arguments to filter query
    public function args()
    {
        return [
            
            'monto' => [
                'name' => 'monto',
                'type' => Type::float()
            ],
            
        ];
    }
    public function resolve($root, $args, SelectFields $fields)
    {
        $where = function ($query) use ($args) {
            if (isset($args['id'])) {
                $query->where('id',$args['id']);
            }
            if (isset($args['dni'])) {
                $query->where('dni',$args['dni']);
            }
        };

        $user = SolicitudDetalle::with(array_keys($fields->getRelations()))
            ->where($where)
            ->select($fields->getSelect())
            ->paginate();
        return $user;
    }
}