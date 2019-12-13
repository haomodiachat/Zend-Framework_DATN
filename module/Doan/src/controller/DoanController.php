<?php
namespace Doan\Controller;
use Doan\Model\Doan;
use Doan\Model\DoanTable;
use Doan\Form\DoanForm;
use Zend\Db\Adapter\Adapter;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class DoanController extends AbstractActionController
{

    private $table;

    public function __construct(DoanTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        $doan = $this -> table -> fetchAll();
        return new ViewModel(['doan' => $doan]);
        return false;
    }
    public function getTableNameAction() {
        $name = $this -> table -> getTableName();
        echo $name;
        return false;
    }

    public function addAction()
    {
        $form = new DoanForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        $doan = new Doan();
        $form->setInputFilter($doan->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return ['form' => $form];
        }

        $doan->exchangeArray($form->getData());
        $this->table->saveDoan($doan);
        return $this->redirect()->toRoute('doan',['controller' => 'DoanController','action' => 'index']);
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }
}
?>