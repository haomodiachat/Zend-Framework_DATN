<?php
namespace Chuyennganh\Model;
use DomainException;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToInt;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\StringLength;
class Chuyennganh {

    public $Macn;
    public $Tencn;
    public $Ghichu;

    public function exchangeArray(array $data)
    {
        $this->Macn = !empty($data['Macn']) ? $data['Macn'] : null;
        $this->Tencn  = !empty($data['Tencn']) ? $data['Tencn'] : null;
        $this->Ghichu  = !empty($data['Ghichu']) ? $data['Ghichu'] : null;
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
            'name' => 'Macn',
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
            'name' => 'Tencn',
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