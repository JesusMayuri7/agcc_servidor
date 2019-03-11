<?php

use App\GraphQL\Query\ClienteQuery;
use App\GraphQL\Query\SolicitudQuery;
use App\GraphQL\Query\EmpleadoQuery;
use App\GraphQL\Query\AhorroQuery;
use App\GraphQL\Query\AuditoriaQuery;
use App\GraphQL\Query\AvalesQuery;
use App\GraphQL\Query\EmpleadoRolQuery;
use App\GraphQL\Query\GarantiaQuery;
use App\GraphQL\Query\GiroNegocioQuery;
use App\GraphQL\Query\LineaCreditoQuery;
use App\GraphQL\Query\MenuQuery;
use App\GraphQL\Query\ModuloQuery;
//use App\GraphQL\Query\PerfilClienteTipoProductoQuery;
use App\GraphQL\Query\PerfilClienteQuery;
use App\GraphQL\Query\PermisoModuloQuery;
use App\GraphQL\Query\PermisoQuery;
use App\GraphQL\Query\ReporteCeopQuery;
use App\GraphQL\Query\ReporteCrediticioQuery;
use App\GraphQL\Query\ResolucionQuery;
use App\GraphQL\Query\RolPermisoQuery;
use App\GraphQL\Query\RolQuery;
use App\GraphQL\Query\SolicitudDetalleQuery;
use App\GraphQL\Query\SolicitudAhorroQuery;
use App\GraphQL\Query\Query;
use App\GraphQL\Query\TipoInfoDetalleQuery;
use App\GraphQL\Query\TipoInfoQuery;
use App\GraphQL\Query\TipoPrestamoQuery;
use App\GraphQL\Query\TipoProductoQuery;


use App\GraphQL\Mutation\ClienteMutation;
use App\GraphQL\Mutation\SolicitudMutation;
use App\GraphQL\Mutation\EmpleadoMutation;
use App\GraphQL\Mutation\ResolucionMutation;
use App\GraphQL\Mutation\AuditoriaMutation;
use App\GraphQL\Mutation\LineaCreditoMutation;
use App\GraphQL\Mutation\PerfilClienteMutation;
use App\GraphQL\Mutation\TipoProductoMutation;
use App\GraphQL\Mutation\PerfilClienteTipoProductoMutation;
use App\GraphQL\Mutation\GiroNegocioMutation;
use App\GraphQL\Mutation\GarantiaMutation;
use App\GraphQL\Mutation\ReporteCrediticioMutation;
use App\GraphQL\Mutation\ReporteCeopMutation;
use App\GraphQL\Mutation\TipoInfoMutation;
use App\GraphQL\Mutation\TipoPrestamoMutation;
use App\GraphQL\Mutation\RolMutation;
use App\GraphQL\Mutation\EmpleadoRolMutation;
use App\GraphQL\Mutation\PermisoMutation;
use App\GraphQL\Mutation\MenuMutation;
use App\GraphQL\Mutation\AhorroMutation;
use App\GraphQL\Mutation\UserRegisterMutation;

use App\GraphQL\Type\ClienteType;
use App\GraphQL\Type\SolicitudType;
use App\GraphQL\Type\EmpleadoType;
use App\GraphQL\Type\AhorroType;
use App\GraphQL\Type\AuditoriaType;
use App\GraphQL\Type\AvalesType;
use App\GraphQL\Type\AvalInputObjectType;
//use App\GraphQL\Type\EmpleadoRolType;
use App\GraphQL\Type\GarantiaType;
use App\GraphQL\Type\GiroNegocioType;
use App\GraphQL\Type\LineaCreditoType;
use App\GraphQL\Type\MenuType;
use App\GraphQL\Type\ModuloType;
use App\GraphQL\Type\PerfilClienteTipoProductoType;
use App\GraphQL\Type\PerfilClienteType;
use App\GraphQL\Type\PermisoModuloType;
use App\GraphQL\Type\PermisoType;
use App\GraphQL\Type\ReporteCeopType;
use App\GraphQL\Type\ReporteCrediticioType;
use App\GraphQL\Type\ResolucionType;
use App\GraphQL\Type\RolPermisoType;
use App\GraphQL\Type\RolType;
use App\GraphQL\Type\SolicitudAhorroType;
use App\GraphQL\Type\SolicitudDetalleType;
use App\GraphQL\Type\TipoInfoDetalleType;
use App\GraphQL\Type\TipoInfoType;
use App\GraphQL\Type\TipoPrestamoType;
use App\GraphQL\Type\TipoProductoType;

return [

    'prefix' => 'graphql',
    'routes' => 'query/{graphql_schema?}',
    'controllers' => \Rebing\GraphQL\GraphQLController::class . '@query',
    'middleware' => [],
    'route_group_attributes' => [],
    'default_schema' => 'default',
    'schemas' => [
        'default' => [
            'query' => [
                'clienteQuery' => ClienteQuery::class,
                'solicitudQuery'=> SolicitudQuery::class,
                'empleadoQuery'=> EmpleadoQuery::class,
                'ahorroQuery'=> AhorroQuery::class,
                'resolucionQuery' => ResolucionQuery::class,
                'auditoriaQuery' => AuditoriaQuery::class,
                'linea_creditoQuery' => LineaCreditoQuery::class,
                'perfil_clienteQuery' => PerfilClienteQuery::class,
                'tipo_productoQuery' => TipoProductoQuery::class,
                'giro_negocioQuery' => GiroNegocioQuery::class,
                'garantiaQuery' => GarantiaQuery::class,
                'reporte_crediticioQuery' => ReporteCrediticioQuery::class,
                'reporte_ceopQuery' => ReporteCeopQuery::class,
                'tipo_infoQuery' => TipoInfoQuery::class,
                'tipo_prestamoQuery' => TipoPrestamoQuery::class,
                'rolQuery' => RolQuery::class,
                'permisoQuery'  =>PermisoQuery::class,
                'menuQuery'  =>MenuQuery::class,
                //'empleado_rolQuery' =>EmpleadoRolQuery::class,
              //  'perfil_cliente_tipo_productoQuery' => PerfilClienteTipoProductoQuery::class,



            ],
            'mutation' => [
                'clienteMutation' => ClienteMutation::class, 
                'solicitudMutation' => SolicitudMutation::class,
                'empleadoMutation' => EmpleadoMutation::class,
                'resolucionMutation' => ResolucionMutation::class,
                'auditoriaMutation' => AuditoriaMutation::class,
                'linea_creditoMutation' =>LineaCreditoMutation::class,
                'perfil_clienteMutation' =>PerfilClienteMutation::class, 
                'tipo_productoMutation' => TipoProductoMutation::class,  
                'perfil_cliente_tipo_productoMutation' => PerfilClienteTipoProductoMutation::class,
                'giro_negocioMutation' => GiroNegocioMutation::class,
                'garantiaMutation' => GarantiaMutation::class,
                'reporte_crediticioMutation' => ReporteCrediticioMutation::class,
                'reporte_ceopMutation' => ReporteCeopMutation::class,
                'tipo_infoMutation' =>TipoInfoMutation::class,
                'tipo_prestamoMutation' =>TipoPrestamoMutation::class,
                'rolMutation' => RolMutation::class,
                'empleado_rolMutation' =>EmpleadoRolMutation::class,
                'permisoMutation' => PermisoMutation::class,
                'menuMutation' => MenuMutation::class,
                'ahorroMutation' => AhorroMutation::class,
                'userRegister' => UserRegisterMutation::class,
            ],
            'middleware' => [],
            'method' => ['get', 'post'],
        ],
    ],
    'types' => [
        'clienteType'  => ClienteType::class,
        'avalesType' => AvalesType::class,
        'solicitudType'=> SolicitudType::class,
        'empleadoType'=> EmpleadoType::class,
        'ahorroType'=> AhorroType::class,
        'resolucionType' => ResolucionType::class,
        'auditoriaType' => AuditoriaType::class,
        'linea_creditoType' => LineaCreditoType::class,
        'perfil_clienteType' => PerfilClienteType::class,
        'tipo_productoType' => TipoProductoType::class,
        'giro_negocioType' => GiroNegocioType::class,
        'garantiaType' => GarantiaType::class,
        'reporte_crediticioType' => ReporteCrediticioType::class,
        'reporte_ceopType' => ReporteCeopType::class,
        'tipo_infoType' => TipoInfoType::class,
        'tipo_prestamoType' =>TipoPrestamoType::class,
        'rolType' =>RolType::class,
        'permisoType'=> PermisoType::class,
        'menuType'=> MenuType::class,
       // 'avalInputObjectType'=>AvalInputObjectType::class,
                //'empleado_rolType' => EmpleadoRolType::class,
    //    'perfil_cliente_tipo_productoType' => PerfilClienteTipoProductoType::class,


    ],
    'error_formatter' => ['\Rebing\GraphQL\GraphQL', 'formatError'],
    'errors_handler' => ['\Rebing\GraphQL\GraphQL', 'handleErrors'],
    'params_key'    => 'variables',
    'security' => [
        'query_max_complexity' => null,
        'query_max_depth' => null,
        'disable_introspection' => false
    ],

    'pagination_type' => \Rebing\GraphQL\Support\PaginationType::class,

    /*
     * Config for GraphiQL (see (https://github.com/graphql/graphiql).
     */
    'graphiql' => [
        'prefix' => '/graphiql/{graphql_schema?}',
        'controller' => \Rebing\GraphQL\GraphQLController::class.'@graphiql',
        'middleware' => [],
        'view' => 'graphql::graphiql',
        'display' => env('ENABLE_GRAPHIQL', true),
    ],
];
