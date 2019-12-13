<?php
namespace Doan;

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
                Model\DoanTable::class => function($container) {
                    $tableGateway = $container->get(Model\DoanTableGateway::class);
                    return new Model\DoanTable($tableGateway);
                },
                Model\DoanTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Doan());
                    return new TableGateway('doan', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }
    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\DoanController::class => function($container) {
                    return new Controller\DoanController(
                        $container->get(Model\DoanTable::class)
                    );
                },
            ],
        ];
    }
}
?>