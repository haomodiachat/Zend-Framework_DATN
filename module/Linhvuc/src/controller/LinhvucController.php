<?php
namespace Linhvuc\Controller;

use Linhvuc\Model\Linhvuc;
use Linhvuc\Model\LinhvucTable;
use Zend\Db\Adapter\Adapter;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Linhvuc\Form\LinhvucForm;

class LinhvucController extends AbstractActionController
{

    private $table;

    public function __construct(LinhvucTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        $linhvuc = $this -> table -> fetchAll();
        return new ViewModel(['linhvuc' => $linhvuc]);
        return false;
    }
    public function getTableNameAction() {
        $name = $this -> table -> getTableName();
        echo $name;
        return false;
    }

    public function addAction()
    {
        $form = new LinhvucForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        $linhvuc = new Linhvuc();
        $form->setInputFilter($linhvuc->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return ['form' => $form];
        }
        $linhvuc->exchangeArray($form->getData());
        $this->table->saveLinhvuc($linhvuc);
        return $this->redirect()->toRoute('linhvuc',['controller' => 'LinhvucController','action' => 'index']);


    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }
}
?>