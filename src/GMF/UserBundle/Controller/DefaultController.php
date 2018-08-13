<?php

namespace GMF\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GMFUserBundle:Default:index.html.twig');
    }
}
