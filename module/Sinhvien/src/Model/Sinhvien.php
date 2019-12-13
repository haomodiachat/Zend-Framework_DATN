<?php
namespace Sinhvien\Model;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\StringLength;
class Sinhvien {

    public $Masv;
    public $Tensv;
    public $Namsinh;
    public $Gioitinh;
    public $Khoa;
    public $Chuyennganh;
    public $Email;
    public $Dienthoai;
    public $Diachi;
    //exchangeArray gán data cho các biến đã khai báo
    public function exchangeArray(array $data)
    {

        $this->Masv = !empty($data['Masv']) ? $data['Masv'] : null;
        $this->Tensv  = !empty($data['Tensv']) ? $data['Tensv'] : null;
        $this->Namsinh  = !empty($data['Namsinh']) ? $data['Namsinh'] : null;
        $this->Gioitinh  = !empty($data['Gioitinh']) ? $data['Gioitinh'] : null;
        $this->Khoa  = !empty($data['Khoa']) ? $data['Khoa'] : null;
        $this->Chuyennganh  = !empty($data['Chuyennganh']) ? $data['Chuyennganh'] : null;
        $this->Email  = !empty($data['Email']) ? $data['Email'] : null;
        $this->Dienthoai  = !empty($data['Dienthoai']) ? $data['Dienthoai'] : null;
        $this->Diachi  = !empty($data['Diachi']) ? $data['Diachi'] : null;

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
            'name' => 'Tensv',
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
            'name' => 'Namsinh',
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
            'name' => 'Gioitinh',
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
            'name' => 'Khoa',
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
            'name' => 'Chuyennganh',
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
            'name' => 'Email',
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
            'name' => 'Dienthoai',
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
            'name' => 'Diachi',
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