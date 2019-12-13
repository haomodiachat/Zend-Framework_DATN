<?php
namespace Linhvuc\Form;
use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
class LinhvucForm extends Form {
    public function __construct($name = null, $options = [])
    {
        parent::__construct($name, $options);

        $this->add([
            'name' => 'Malv',
            'type' => 'text',
            'options' => [
                'label' => 'Mã lĩnh vực',
            ],
        ]);
        $this->add([
            'name' => 'Tenlv',
            'type' => 'text',
            'options' => [
                'label' => 'Tên lĩnh vực',
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