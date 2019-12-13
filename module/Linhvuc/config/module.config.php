<?php
namespace Linhvuc;
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
            'linhvuc' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/linhvuc[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\LinhvucController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'linhvuc' => __DIR__ . '/../view',
        ],
    ],

];
?>