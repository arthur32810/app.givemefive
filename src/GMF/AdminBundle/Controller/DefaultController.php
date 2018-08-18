<?php

namespace GMF\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GMFAdminBundle:Default:index.html.twig');
    }
}
