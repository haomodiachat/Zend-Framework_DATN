<?php
namespace Doan;
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
            'doan' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/doan[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\DoanController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'doan' => __DIR__ . '/../view',
        ],
    ],

];
?>