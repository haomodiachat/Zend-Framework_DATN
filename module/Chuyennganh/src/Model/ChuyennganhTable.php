<?php
namespace Chuyennganh\Model;

use Chuyennganh\Model\Chuyennganh;
use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class ChuyennganhTable
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
    public function saveChuyennganh(Chuyennganh $chuyennganh)
    {
        $data = [
            'Macn' => $chuyennganh -> Macn,
            'Tencn' => $chuyennganh -> Tencn,
            'Ghichu' => $chuyennganh -> Ghichu
        ];
        $this ->tableGateway -> insert($data);
        return;
    }
    public function findChuyennganh($macn)
    {
        $macn = (int)$macn;
        $chuyennganh = $this ->tableGateway-> select(['Macn' => $macn ]);
        $chuyennganh = $chuyennganh ->current();
        if(!$chuyennganh) {
            throw  new \http\Exception\RuntimeException("không tìm thấy");
        }
        return $chuyennganh;
    }

}
?>