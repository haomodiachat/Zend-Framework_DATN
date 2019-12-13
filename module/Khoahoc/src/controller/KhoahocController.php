<?php
namespace Khoahoc\Controller;

use Khoahoc\Model\KhoahocTable;
use Khoahoc\Form\KhoahocForm;
use Zend\Db\Adapter\Adapter;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class KhoahocController extends AbstractActionController
{

    private $table;

    public function __construct(KhoahocTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        $khoahoc = $this -> table -> fetchAll();
        return new ViewModel(['khoahoc' => $khoahoc]);
        return false;
    }
    public function getTableNameAction() {
        $name = $this -> table -> getTableName();
        echo $name;
        return false;
    }

    public function addAction()
    {
        $form = new KhoahocForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        $khoahoc = new Khoahoc();
        $form->setInputFilter($khoahoc->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return ['form' => $form];
        }

        $khoahoc->exchangeArray($form->getData());
        $this->table->saveKhoahoc($khoahoc);
        return $this->redirect()->toRoute('khoahoc');

    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }
}
?>