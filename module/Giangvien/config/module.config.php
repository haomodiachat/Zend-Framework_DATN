<?php
namespace Giangvien;
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
            'giangvien' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/giangvien[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\GiangvienController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'giangvien' => __DIR__ . '/../view',
        ],
    ],

];
?>