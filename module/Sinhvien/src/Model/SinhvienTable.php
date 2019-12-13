<?php
namespace Sinhvien\Model;

use Sinhvien\Model\Sinhvien;
use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class SinhvienTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
        /*$adapter = $this -> tableGateway -> getAdapter();
        $sql = new Sql($adapter);
        $select = $sql -> select();
        $select -> from(['sinhvien']);
        $select -> columns(['Masv', 'Tensv', 'Namsinh', 'Gioitinh', 'Khoa', 'Email', 'Dienthoai', 'Diachi']);
        $select -> join(['khoahoc'], 'khoahoc.Makh = sinhvien.khoa',['Tenkhoa' => 'Khoa'], $select:: JOIN_LEFT);

        $selectString = $sql -> builSqlString($select);
        $results = $adapter -> query($selectString, $adapter::QUERY_MODE_EXCUTE);
        return $results;*/

    }
    public function getTableName() {
        return $this -> tableGateway -> getTable();

    }
    public function saveSinhvien(Sinhvien $sinhvien)
    {
        $data = [
            'Masv' => $sinhvien -> Masv,
            'Tensv' => $sinhvien -> Tensv,
            'Namsinh' => $sinhvien -> Namsinh,
            'Gioitinh' => $sinhvien -> Gioitinh,
            'Khoa' => $sinhvien -> Khoa,
            'Chuyennganh' => $sinhvien -> Chuyennganh,
            'Email' => $sinhvien -> Email,
            'Dienthoai' => $sinhvien -> Dienthoai,
            'Diachi' => $sinhvien -> Diachi

        ];
        $this ->tableGateway -> insert($data);
        return;
    }

}
?>