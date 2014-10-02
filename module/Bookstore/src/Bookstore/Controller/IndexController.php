<?php

namespace Bookstore\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {

        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Bookstore\Entity\Categoria');

        $categorias = $repo->findAll();

        return new ViewModel(array('categorias' => $categorias));
    }
}
