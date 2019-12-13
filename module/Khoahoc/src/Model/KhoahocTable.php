<?php
namespace Khoahoc\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class KhoahocTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }
    //select
    public function fetchAll()
    {
        return $this->tableGateway->select();

    }
    //getTable()
    public function getTableName() {
        return $this -> tableGateway -> getTable();

    }
}
?>