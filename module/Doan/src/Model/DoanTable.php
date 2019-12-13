<?php
namespace Doan\Model;

use Doan\Model\Doan;
use RuntimeException;

use Zend\Db\Sql\Sql;
use Zend\Db\TableGateway\TableGatewayInterface;

class DoanTable
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
    /*public function getDoan() {
        $adpater = $this ->tableGateway -> getAdapter();
        $sql = new Sql($adpater);
        $select = $sql -> select();
        $select -> from('doan');
        $select -> columns(['GVHD','Tengv']);
        $select -> join(['giangvien'],'doan.GVHD = giangvien.Magv',[], $select::JOIN_LEFT);
        $selectString = $sql ->buildSqlString($select);
        $result = $adpater -> query($selectString, $adpater :: QUERY_MODE_EXECUTE);
        return $result;

    }*/
    public function saveDoan(Doan $doan)
    {
        $data = [
            'Masv' => $doan -> Masv,
            'Tenda' => $doan -> Tenda,
            'GVHD' => $doan -> GVHD,
            'GVPB' => $doan -> GVPB,
            'Linhvuc' => $doan -> Linhvuc,
            'Diem' => $doan -> Diem,
            'Namtn' => $doan -> Namtn,
        ];
        $this ->tableGateway -> insert($data);
        return;
    }
}
?>