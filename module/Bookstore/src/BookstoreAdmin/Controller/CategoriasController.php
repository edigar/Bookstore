<?php

namespace BookstoreAdmin\Controller;

use Doctrine\DBAL\Schema\View;
use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;

use Zend\Paginator\Paginator,
    Zend\Paginator\Adapter\ArrayAdapter;

use BookstoreAdmin\Form\Categoria as FrmCategoria;

class CategoriasController extends AbstractActionController {

    /**
     * @var EntityManager
     */
    protected $em;

    public function indexAction() {
        $list = $this->getEm()->getRepository('Bookstore\Entity\Categoria')->findAll();

        $page = $this->params()->fromRoute('page');

        $paginator = new Paginator(new ArrayAdapter($list));
        $paginator->setCurrentPageNumber($page);
        $paginator->setDefaultItemCountPerPage(5);

        return new ViewModel(array('data' => $paginator, 'page' => $page));
    }

    public function newAction() {
        $form = new FrmCategoria();

        $request = $this->getRequest();

        if($request->isPost()) {
            $form->setData($request->getPost());
            if($form->idValid()) {
                //Rotina de inserir

                return $this->redirect()->toRoute('bookstore-admin', array('controller'=>'categorias'));
            }
        }

        return new ViewModel(array('form' => $form));
    }

    /**
     * @return EntityManager
     */
    Protected function getEm() {
        if(null === $this->em)
            $this->em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        return $this->em;
    }
}