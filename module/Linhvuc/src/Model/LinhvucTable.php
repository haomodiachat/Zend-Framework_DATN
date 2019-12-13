<?php
namespace Linhvuc\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class LinhvucTable
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
    public function saveLinhvuc(Linhvuc $linhvuc)
    {
        $data = [
         'Malv' => $linhvuc -> Malv,
         'Tenlv' => $linhvuc -> Tenlv,
         'Ghichu' => $linhvuc -> Ghichu
        ];
        $this ->tableGateway -> insert($data);
        return;
    }

}
?>