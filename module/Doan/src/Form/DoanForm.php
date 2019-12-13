<?php
namespace Doan\Form;
use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
class DoanForm extends Form {
    public function __construct($name = null, $options = [])
    {
        parent::__construct($name, $options);

        $this->add([
            'name' => 'Masv',
            'type' => 'text',
            'options' => [
                'label' => 'Mã sinh viên',
            ],
        ]);
        $this->add([
            'name' => 'Tenda',
            'type' => 'text',
            'options' => [
                'label' => 'Tên đồ án',
            ],
        ]);
        $this->add([
            'name' => 'GVHD',
            'type' => 'text',
            'options' => [
                'label' => 'Giáo viên hướng dẫn',
            ],
        ]);
        $this->add([
            'name' => 'GVPB',
            'type' => 'text',
            'options' => [
                'label' => 'Giáo viên phản biện',
            ],
        ]);
        $this->add([
            'name' => 'Linhvuc',
            'type' => 'text',
            'options' => [
                'label' => 'Lĩnh vực ',
            ],
        ]);
        $this->add([
            'name' => 'Diem',
            'type' => 'text',
            'options' => [
                'label' => 'Diem',
            ],
        ]);
        $this->add([
            'name' => 'Namtn',
            'type' => 'date',
            'options' => [
                'label' => 'Năm tốt nghiệp',
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