<?php

// src/GMF/DevisBundle/Controller/DevisController.php

namespace GMF\DevisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DevisController extends Controller
{
    public function indexAction()
    {
    	// Affiche la page d'accueil
        return $this->render('GMFDevisBundle:Devis:index.html.twig');
    }

    public function orderAction()
    {
    	// Affiche la page de formulaire
    	return $this->render('GMFDevisBundle:Devis:order.html.twig');
    }

    public function createOrderAction()
    {
    	return new Response("create order");
    }

    public function thanksAction()
    {
    	return new Response("thanks");
    }
}