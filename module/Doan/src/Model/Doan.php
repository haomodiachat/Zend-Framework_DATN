<?php
namespace Doan\Model;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\StringLength;

class Doan {

    public $Masv;
    public $Tenda;
    public $GVHD;
    public $GVPB;
    public $Linhvuc;
    public $Diem;
    public $Namtn;

    public function exchangeArray(array $data)
    {

        $this->Masv = !empty($data['Masv']) ? $data['Masv'] : null;
        $this->Tenda = !empty($data['Tenda']) ? $data['Tenda'] : null;
        $this->GVHD  = !empty($data['GVHD']) ? $data['GVHD'] : null;
        $this->GVPB  = !empty($data['GVPB']) ? $data['GVPB'] : null;
        $this->Linhvuc  = !empty($data['Linhvuc']) ? $data['Linhvuc'] : null;
        $this->Diem  = !empty($data['Diem']) ? $data['Diem'] : null;
        $this->Namtn  = !empty($data['Namtn']) ? $data['Namtn'] : null;
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
            'name' => 'Masv',
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
            'name' => 'Tenda',
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
            'name' => 'GVHD',
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
        $inputFilter->add([
            'name' => 'GVPB',
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
        ]); $inputFilter->add([
        'name' => 'linhvuc',
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
        $inputFilter->add([
            'name' => 'Diem',
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
        $inputFilter->add([
            'name' => 'Namtn',
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