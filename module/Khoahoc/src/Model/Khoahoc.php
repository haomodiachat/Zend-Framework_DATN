<?php
namespace Khoahoc\Model;
class Khoahoc {
    public $Makh;
    public $Tenkhoa;
    public $Thoigian;
    public $Ghichu;

    public function exchangeArray(array $data)
    {
        $this->Makh = !empty($data['Makh']) ? $data['Makh'] : null;
        $this->Tenkhoa  = !empty($data['Tenkhoa']) ? $data['Tenkhoa'] : null;
        $this->Thoigian  = !empty($data['Thoigian']) ? $data['Thoigian'] : null;
        $this->Ghichu  = !empty($data['Ghichu']) ? $data['Ghichu'] : null;
    }
}
?>