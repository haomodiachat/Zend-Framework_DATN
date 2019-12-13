<?php
namespace Chuyennganh\Controller;

use Chuyennganh\Model\Chuyennganh;
use Chuyennganh\Model\ChuyennganhTable;
use Zend\Db\Adapter\Adapter;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Chuyennganh\Form\ChuyennganhForm;

class ChuyennganhController extends AbstractActionController
{

    private $table;

    public function __construct(ChuyennganhTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        $chuyennganh = $this -> table -> fetchAll();
        return new ViewModel(['chuyennganh' => $chuyennganh]);
        return false;
    }
    public function getTableNameAction() {
        $name = $this -> table -> getTableName();
        echo $name;
        return false;
    }

    public function addAction()
    {

        $form = new ChuyennganhForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['form' => $form];
        }

        $chuyennganh = new Chuyennganh();
        $form->setInputFilter($chuyennganh->getInputFilter());
        $form->setData($request->getPost());

        if (! $form->isValid()) {
            return ['form' => $form];
        }

        $chuyennganh->exchangeArray($form->getData());
        $this->table->saveChuyennganh($chuyennganh);
        return $this->redirect()->toRoute('chuyennganh',['controller' => 'ChuyennganhController','action' => 'index']);

    }

    public function editAction()
    {
        {
            $macn = (int) $this->params()->fromRoute('Macn', 0);

            if (0 === $macn) {
                return $this->redirect()->toRoute('chuyennganh', ['action' => 'add']);
            }

            /*try {
                $chuyennganh = $this->table->getChuyennganh($macn);
            } catch (\Exception $e) {
                return $this->redirect()->toRoute('chuyennganh', ['action' => 'index']);
            }*/
            $macn = $this ->table ->findChuyennganh($macn);
            echo '<pre>';
            print_r($macn);
            echo '</pre>';
            die;

            $form = new ChuyennganhForm();
            $form->bind($chuyennganh);
            $form->get('submit')->setAttribute('value', 'Edit');

            $request = $this->getRequest();
            $viewData = ['Macn' => $macn, 'form' => $form];

            if (! $request->isPost()) {
                return $viewData;
            }

            $form->setInputFilter($album->getInputFilter());
            $form->setData($request->getPost());

            if (! $form->isValid()) {
                return $viewData;
            }

            $this->table->saveAlbum($album);

            // Redirect to album list
            return $this->redirect()->toRoute('album', ['action' => 'index']);
        }
    }

    public function deleteAction()
    {
    }
}
?>