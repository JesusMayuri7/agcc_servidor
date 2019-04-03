<?php

namespace App\GraphQL\Mutation;


use App\Http\Models\Solicitud;
use GraphQL\Type\Definition\InputObjectType;
use App\GraphQL\Type\AvalInputObjectType;
use JWTAuth;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class SolicitudMutation extends Mutation
{
    protected $attributes = [
        'name' => 'NewSolicitud'
    ];
    public function type()
    {
        return GraphQL::type('solicitudType');
    }
    public function authorize(array $args)
    {
       try {
            $this->auth = JWTAuth::parseToken()->authenticate();
        } catch (\Exception $e) {
            $this->auth = null;
        }
        return (boolean) $this->auth;
    }
    public function args()
    {
        return [
            'id' => [
                'name'=>'id',
                'type' => Type::int(),
                'description' => 'The id of the user'
            ],
            'activo' => [
                'name'=>'activo',
                'type' =>  Type::int(),
                'description' => 'The activo of user'
            ],
            'monto' => [
                'name'=>'monto',
                'type' => Type::float(),
                'description' => 'The monto of the user'
            ],
            'plazo' => [
                'name'=>'plazo',
                'type' => Type::int(),
                'description' => 'The plazo of the user'
            ],
            'cuota' => [
                'name'=>'cuota',
                'type' => Type::float(),
                'description' => 'cuota del Cliente'
            ],
            'interes' => [
                'name'=>'interes',
                'type' => Type::float(),
                'description' => 'interes del Cliente'
            ],
            'comentario' => [
                'name'=>'comentario',
                'type' => Type::string(),
                'description' => 'comentario del Cliente'
            ],
            'nro_solicitud' => [
                'name'=>'nro_solicitud',
                'type' => Type::string(),
                'description' => 'Apellido materno del Cliente'
            ],
            'estado' => [
                'name'=>'estado',
                'type' => Type::string(),
                'description' => 'Apellido materno del Cliente'
            ],
            'cliente_id' => [
                'name'=>'cliente_id',
                'type' => Type::int(),
                'description' => 'The plazo of the user'
            ],
            'empleado_id' => [
                'name'=>'empleado_id',
                'type' => Type::int(),
                'description' => 'The plazo of the user'
            ],
            'reporte_ceop_id' => [
                'name'=>'reporte_ceop_id',
                'type' => Type::int(),
                'description' => 'The plazo of the user'
            ],
            'reporte_info_id' => [
                'name'=>'historial_crediticio_id',
                'type' => Type::int(),
                'description' => 'The plazo of the user'
            ],
            'giro_negocio_id' => [
                'name'=>'giro_negocio_id',
                'type' => Type::int(),
                'description' => 'The plazo of the user'
            ],
            'garantia_id' => [
                'name'=>'garantia_id',
                'type' => Type::int(),
                'description' => 'The plazo of the user'
            ],
            'perfil_cliente_tipo_producto_id' => [
                'name'=>'perfil_cliente_tipo_producto_id',
                'type' => Type::int(),
                'description' => 'The plazo of the user'
            ],
            'tipo_prestamo_id' => [
                'name'=>'tipo_prestamo_id',
                'type' => Type::int(),
                'description' => 'The plazo of the user'
            ],
            'avales' => [
                'type' => Type::listOf(new InputObjectType([
                    'name' => 'avalInputObjectType',
                    'fields' => [
                        'cliente_id' => [
                            'type' => Type::int(),
                            'description' => 'The id of the subject'
                        ],
                        'solicitud_id' => [
                            'type' => Type::int(),
                            'description' => 'The name of the subject'
                        ],
                        'tipo' => [
                            'type' => Type::string(),
                            'description' => 'The name of the subject'
                        ]
                    ]
                ])),                   
                'description' => 'The profile of the user'
           ],
           'tipo_info_detalle' => [
            'type' => Type::listOf(new InputObjectType([
                'name' => 'tipoInfoDetalleInputObjectType',
                'fields' => [
                    'tipo_info_detalle_id' => [
                        'type' => Type::int(),
                        'description' => 'The id of the subject'
                    ],
                    'solicitud_id' => [
                        'type' => Type::int(),
                        'description' => 'The name of the subject'
                    ],
                    'monto' => [
                        'type' => Type::float(),
                        'description' => 'The name of the subject'
                    ]
                ]
            ])),                   
            'description' => 'The profile of the user'
            ],
            'ahorro_inicial' => [
                'name'=>'ahorro_inicial',
                'type' => Type::float(),
                'description' => 'The plazo of the user'
            ],
            'ahorro_programado' => [
                'name'=>'ahorro_programado',
                'type' => Type::float(),
                'description' => 'The plazo of the user'
            ],
            'tipo_interes' => [
                'name'=>'tipo_interes',
                'type' => Type::string(),
                'description' => 'The plazo of the user'
            ],
        ];
    }
    public function resolve($root, $args)
    {
        //dd($args);
        $payload=auth()->payload();
        $where = function ($query) use ($args) {
            if (isset($args['id'])) {
                $query->where('id',$args['id']);
            }
            if (isset($args['desc_linea_credito'])) {
                $query->where('desc_linea_credito','LIKE','%'.$args['desc_linea_credito'].'%');
            }

        };
        if (isset($args['id'])) {
           $user = Solicitud::find($args['id']);
           if (!$user) {
            return null;
            }
           $user->update($args); 
           if (isset($args['avales'])) {
                $aval = $user->avales()->detach();
                $aval=[];
                foreach ($args['avales'] as $item) {
                        array_push($aval,array('solicitud_id'=>$item['solicitud_id'],'cliente_id'=>$item['cliente_id'] , 'tipo' =>$item['tipo']));
                };
                $user->avales()->attach($aval);
            }
            if (isset($args['tipo_info_detalle'])) {
                $aval = $user->tipo_info_detalle()->detach();
                $aval=[];
                foreach ($args['tipo_info_detalle'] as $item) {
                        array_push($aval,array('solicitud_id'=>$item['solicitud_id'],'tipo_info_detalle_id'=>$item['tipo_info_detalle_id'] , 'monto' =>$item['monto']));
                };
                $user->tipo_info_detalle()->attach($aval);
            }                    
           return $user;
        }
        else {
            $args['empleado_id']=$payload['sub'];
            $args['nro_solicitud'] = Solicitud::max('nro_solicitud')+1;
            $user = Solicitud::create($args);
            if (!$user) {
                return null;
            }
            if (isset($args['avales'])) {
                $aval = $user->avales()->detach();
                $aval=[];
                foreach ($args['avales'] as $item) {
                        array_push($aval,array('solicitud_id'=>$user->id,'cliente_id'=>$item['cliente_id'] , 'tipo' =>$item['tipo']));
                };
                $user->avales()->attach($aval);
            }
            if (isset($args['tipo_info_detalle'])) {
                $aval = $user->tipo_info_detalle()->detach();
                $aval=[];
                foreach ($args['tipo_info_detalle'] as $item) {
                        array_push($aval,array('solicitud_id'=>$user->id,'tipo_info_detalle_id'=>$item['tipo_info_detalle_id'] , 'monto' =>$item['monto']));
                };
                $user->tipo_info_detalle()->attach($aval);
            }         
            return $user;
        }

    }
}