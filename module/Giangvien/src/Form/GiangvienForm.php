<?php
namespace Giangvien\Form;
use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
class GiangvienForm extends Form {
    public function __construct($name = null, $options = [])
    {
        parent::__construct($name, $options);

        $this->add([
            'name' => 'Magv',
            'type' => 'text',
            'options' => [
                'label' => 'Mã giảng viên',
            ],
        ]);
        $this->add([
            'name' => 'Tengv',
            'type' => 'text',
            'options' => [
                'label' => 'Tên giảng viên',
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
            'name' => 'Hocvi',
            'type' => 'text',
            'options' => [
                'label' => 'Học vị',
            ],
        ]);
        $this->add([
            'name' => 'Email',
            'type' => 'email',
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