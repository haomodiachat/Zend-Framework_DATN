<?php
namespace Chuyennganh\Form;
use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
class ChuyennganhForm extends Form {
    public function __construct($name = null, $options = [])
    {
        parent::__construct($name, $options);

        $this->add([
            'name' => 'Macn',
            'type' => 'text',
            'options' => [
                'label' => 'Mã chuyên ngành',
            ],
        ]);
        $this->add([
            'name' => 'Tencn',
            'type' => 'text',
            'options' => [
                'label' => 'Tên chuyên ngành',
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