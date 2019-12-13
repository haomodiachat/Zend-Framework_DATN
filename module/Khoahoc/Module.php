<?php
namespace Khoahoc;

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
                Model\KhoahocTable::class => function($container) {
                    $tableGateway = $container->get(Model\KhoahocTableGateway::class);
                    return new Model\KhoahocTable($tableGateway);
                },
                Model\KhoahocTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Khoahoc());
                    return new TableGateway('khoahoc', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }
    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\KhoahocController::class => function($container) {
                    return new Controller\KhoahocController(
                        $container->get(Model\KhoahocTable::class)
                    );
                },
            ],
        ];
    }
}
?>