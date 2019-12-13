<?php
namespace Khoahoc\Form;
use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
class KhoahocForm extends Form {
    public function __construct($name = null, $options = [])
    {
        parent::__construct($name, $options);

        $this->add([
            'name' => 'Makh',
            'type' => 'text',
            'options' => [
                'label' => 'Mã khóa học',
            ],
        ]);
        $this->add([
            'name' => 'Tenkh',
            'type' => 'text',
            'options' => [
                'label' => 'Tên khóa học',
            ],
        ]);
        $this->add([
            'name' => 'Thoigian',
            'type' => 'text',
            'options' => [
                'label' => 'Thời gian',
            ],
        ]);
        $this->add([
            'name' => 'Ghichu',
            'type' => 'text',
            'options' => [
                'label' => 'Ghi chú',
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