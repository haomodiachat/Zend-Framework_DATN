<?php
namespace Giangvien\Controller;
use Giangvien\Model\Giangvien;
use Giangvien\Model\GiangvienTable;
use Zend\Db\Adapter\Adapter;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Giangvien\Form\GiangvienForm;

class GiangvienController extends AbstractActionController
{

    private $table;

    public function __construct(GiangvienTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        $giangvien = $this -> table -> fetchAll();
        return new ViewModel(['giangvien' => $giangvien]);
        return false;
    }
    public function getTableNameAction() {
        $name = $this -> table -> getTableName();
        echo $name;
        return false;
    }

    public function addAction()
    {
        $form = new GiangvienForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        $giangvien = new Giangvien();
        $form->setInputFilter($giangvien->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return ['form' => $form];
        }

        $giangvien->exchangeArray($form->getData());
        $this->table->saveGiangvien($giangvien);
        return $this->redirect()->toRoute('giangvien',['controller' => 'GiangvienController','action' => 'index']);

    }


    public function editAction()
    {
    }

    public function deleteAction()
    {
    }
}
?>