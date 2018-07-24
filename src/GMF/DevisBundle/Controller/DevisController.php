<?php

// src/GMF/DevisBundle/Controller/DevisController.php

namespace GMF\DevisBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

class DevisController
{
    public function indexAction()
    {
        return new Response("Notre propre Hello World !");
    }

    public function orderAction()
    {
    	return new Response("order");
    }

    public function createOrderAction()
    {
    	return new Response("create order")
    }

    public function thanksAction()
    {
    	return new Response("thanks");
    }
}