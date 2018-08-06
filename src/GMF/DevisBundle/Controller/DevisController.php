<?php

// src/GMF/DevisBundle/Controller/DevisController.php

namespace GMF\DevisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use GMF\DevisBundle\Entity\Contact;
use GMF\DevisBundle\Form\ContactType;

class DevisController extends Controller
{
    public function indexAction()
    {
    	// Affiche la page d'accueil
        return $this->render('GMFDevisBundle:Devis:index.html.twig');
    }

    public function orderAction(Request $request)
    {
    	//Formulaire sans entité
    	$form = $this->get('form.factory')->create(ContactType::class);

        if($request->isMethod('POST') && $form->handleRequest($request))
        {
            $datas = $form->getData();

            $modules = $datas['modules'];
            if($modules == null)
            {
                echo 'null';
            }
            else 
            {
                echo 'not null';
            }

            var_dump($datas);
        }

    	// Affiche la page de formulaire
    	return $this->render('GMFDevisBundle:Devis:order.html.twig', array('form' => $form->createView(),));
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