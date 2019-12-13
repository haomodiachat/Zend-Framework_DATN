<?php
namespace Linhvuc\Model;
use DomainException;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToInt;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\NotEmpty;
use Zend\Validator\StringLength;

class Linhvuc {
    public $Malv;
    public $Tenlv;
    public $Ghichu;

    public function exchangeArray(array $data)
    {
        $this->Malv = !empty($data['Malv']) ? $data['Malv'] : null;
        $this->Tenlv = !empty($data['Tenlv']) ? $data['Tenlv'] : null;
        $this->Ghichu = !empty($data['Ghichu']) ? $data['Ghichu'] : null;

    }
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new DomainException(sprintf(
            '%s does not allow injection of an alternate input filter',
            __CLASS__
        ));
    }
    public function getInputFilter()
    {

        $inputFilter = new InputFilter();
        //mã lĩnh vực
        $inputFilter->add([
            'name' => 'Malv',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,

                    ],
                ],
            ],
        ]);
        //tên lĩnh vực
        $inputFilter->add([
            'name' => 'Tenlv',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,

                    ],
                ],
            ],
        ]);
        //ghi chú
        $inputFilter->add([
            'name' => 'Ghichu',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,

                    ],
                ],
            ],
        ]);

        $this->inputFilter = $inputFilter;
        return $this->inputFilter;
    }

}
?>