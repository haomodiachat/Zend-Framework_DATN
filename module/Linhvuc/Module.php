<?php
namespace Linhvuc;

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
                Model\LinhvucTable::class => function($container) {
                    $tableGateway = $container->get(Model\LinhvucTableGateway::class);
                    return new Model\LinhvucTable($tableGateway);
                },
                Model\LinhvucTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Linhvuc());
                    return new TableGateway('linhvuc', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }
    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\LinhvucController::class => function($container) {
                    return new Controller\LinhvucController(
                        $container->get(Model\LinhvucTable::class)
                    );
                },
            ],
        ];
    }
}
?>