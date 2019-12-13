<?php
namespace SinhVien\Form;

use Zend\Form\Form;

class SinhVienForm extends Form
{
    public function __construct($name = null)
    {
// We will ignore the name provided to the constructor
    parent::__construct('sinhvien');

        $this->add([
            'name' => 'Masv',
            'type' => 'text',
            'options' => [
                'label' => 'Mã sinh viên',
            ],
        ]);
        $this->add([
            'name' => 'Tensv',
            'type' => 'text',
            'options' => [
            'label' => 'Tên sinh viên',
            ],
        ]);
        $this->add([
            'name' => 'Namsinh',
            'type' => 'date',
            'options' => [
                'label' => 'Năm sinh',
            ],
        ]);
        $this->add([
            'name' => 'Gioitinh',
            'type' => 'text',
            'options' => [
                'label' => 'Giới tính',
            ],
        ]);
        $this->add([
            'name' => 'Khoa',
            'type' => 'text',
            'options' => [
                'label' => 'Khóa học',
            ],
        ]);
        $this->add([
            'name' => 'Chuyennganh',
            'type' => 'text',
            'options' => [
                'label' => 'Chuyên ngành',
            ],
        ]);
        $this->add([
            'name' => 'Email',
            'type' => 'text',
            'options' => [
                'label' => 'Email',
            ],
        ]);
        $this->add([
            'name' => 'Dienthoai',
            'type' => 'tel',
            'options' => [
                'label' => 'Điện thoại',
            ],
        ]);
        $this->add([
            'name' => 'Diachi',
            'type' => 'text',
            'options' => [
                'label' => 'Địa chỉ',
            ],
        ]);
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
                'attributes' => [
                'value' => 'Go',
                'id'    => 'submitbutton',
            ],
        ]);
    }
}
?>