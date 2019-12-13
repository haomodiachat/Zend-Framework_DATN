<?php
namespace Sinhvien;

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
                Model\SinhvienTable::class => function($container) {
                    $tableGateway = $container->get(Model\SinhvienTableGateway::class);
                    return new Model\SinhvienTable($tableGateway);
                },
                Model\SinhvienTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Sinhvien());
                    return new TableGateway('sinhvien', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }
    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\SinhvienController::class => function($container) {
                    return new Controller\SinhvienController(
                        $container->get(Model\SinhvienTable::class)
                    );
                },
            ],
        ];
    }
}
?>