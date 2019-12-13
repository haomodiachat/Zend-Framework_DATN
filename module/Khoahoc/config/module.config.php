<?php
namespace Khoahoc;
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
            'khoahoc' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/khoahoc[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\KhoahocController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'khoahoc' => __DIR__ . '/../view',
        ],
    ],

];
?>