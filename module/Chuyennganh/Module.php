<?php
namespace Chuyennganh;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '../config/module.config.php';
    }
    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\ChuyennganhTable::class => function($container) {
                    $tableGateway = $container->get(Model\ChuyennganhTableGateway::class);
                    return new Model\ChuyennganhTable($tableGateway);
                },
                Model\ChuyennganhTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Chuyennganh());
                    return new TableGateway('chuyennganh', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }
    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\ChuyennganhController::class => function($container) {
                    return new Controller\ChuyennganhController(
                        $container->get(Model\ChuyennganhTable::class)
                    );
                },
            ],
        ];
    }
}
?>