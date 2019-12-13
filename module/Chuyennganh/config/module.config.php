<?php
namespace Chuyennganh;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
       /* 'factories' => [
            Controller\ChuyennganhController::class => InvokableFactory::class,
        ],*/
    ],
    'router' => [
        'routes' => [
            'chuyennganh' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/chuyennganh[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\ChuyennganhController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'chuyennganh' => __DIR__ . '/../view',
        ],
    ],

];
?>