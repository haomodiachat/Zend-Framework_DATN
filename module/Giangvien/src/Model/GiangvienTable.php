<?php
namespace Giangvien\Model;

use Giangvien\Model\Giangvien;
use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class GiangvienTable
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
    public function saveGiangvien(Giangvien $giangvien)
    {
        $data = [
            'Magv' => $giangvien -> Magv,
            'Tengv' => $giangvien -> Tengv,
            'Namsinh' => $giangvien -> Namsinh,
            'Gioitinh' => $giangvien -> Gioitinh,
            'Hocvi' => $giangvien -> Hocvi,
            'Email' => $giangvien -> Email,
            'Dienthoai' => $giangvien -> Dienthoai,
            'Diachi' => $giangvien -> Diachi

        ];
        $this ->tableGateway -> insert($data);
        return;
    }
}
?>