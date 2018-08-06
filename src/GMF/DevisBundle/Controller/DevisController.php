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
            //défintion de la session
            $session = $request->getSession();

            //Récupération des données du formulaire
            $datas = $form->getData();

            //Appel du service GMFOrderAction
            $orderAction = $this->container->get('gmf_devis.orderAction');

            //Test si au moins un modules à été sélectionné
            $modules = $orderAction->modulesNotNull($datas);
            
            if($modules)
            {
                
            }
            else 
            { 
                $session->getFlashBag()->add('modules', 'Vous devez sélectionnez au moins un module');
            }
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