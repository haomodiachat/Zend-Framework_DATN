<?php
namespace Sinhvien\Controller;

use  Sinhvien\Model\Sinhvien;
use Sinhvien\Form\SinhvienForm;
use Sinhvien\Model\SinhvienTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\View;

class SinhvienController extends AbstractActionController
{
    private $table;
    public function __construct(SinhvienTable $table)
    {
        $this -> table = $table;
    }

    public function indexAction()
    {
        $sinhvien = $this -> table -> fetchAll();
        return new ViewModel(['sinhvien' => $sinhvien]);
        return false;

    }

    public function addAction()
    {
        $form = new SinhvienForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        $sinhvien = new Sinhvien();
        $form->setInputFilter($sinhvien->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return ['form' => $form];
        }

        $sinhvien->exchangeArray($form->getData());
        $this->table->saveSinhvien($sinhvien);
        return $this->redirect()->toRoute('sinhvien');
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }
    public function getTableNameAction() {
        $name = $this -> table -> getTableName();
        echo $name;
        return false;
    }
}
?>