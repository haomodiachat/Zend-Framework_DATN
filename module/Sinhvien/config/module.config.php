<?php
namespace Sinhvien;
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
            'sinhvien' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/sinhvien[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\SinhvienController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'sinhvien' => __DIR__ . '/../view',
        ],
    ],

];
?>