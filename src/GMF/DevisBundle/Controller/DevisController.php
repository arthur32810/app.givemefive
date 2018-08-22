<?php

// src/GMF/DevisBundle/Controller/DevisController.php

namespace GMF\DevisBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use GMF\DevisBundle\Entity\Contact;
use GMF\DevisBundle\Entity\Modules;
use GMF\DevisBundle\Entity\Devis;
use GMF\DevisBundle\Form\DevisType;
use GMF\DevisBundle\Form\ContactType;

class DevisController extends Controller
{
    public function indexAction()
    {
    	// Affiche la page d'accueil
        return $this->render('GMFDevisBundle:Devis:index.html.twig');
    }

    public function modulesAction()
    {
        //Affichage de la page modules
        return $this->render('GMFDevisBundle:Devis:modules.html.twig');
    }

    public function orderAction(Request $request)
    {
    	$devis = new Devis();
    	$form = $this->get('form.factory')->create(DevisType::class, $devis);

        if($request->isMethod('POST') && $form->handleRequest($request)->isValid())
        {
          
            /*//défintion de la session
            $session = $request->getSession();

            //Récupération des données du formulaire
            $datas = $form->getData();

            //Appel du service GMFOrderAction
            $orderAction = $this->container->get('gmf_devis.orderAction');

            //Test si au moins un modules à été sélectionné
            $modules = $orderAction->modulesNotNull($datas);
            
            if($modules)
            {
                // récupération de l'entité modules
                $modules = new Modules();

                // On récupère l'EntityManager
                $em = $this->getDoctrine()->getManager();

                //on défini les modules sélectionnés dans l'entité
                $modules = $orderAction->persistModules($datas['modules'], $modules, $em);

                //Récupération de l'entité contact
                $contact = new Contact();

                // on défini l'entité contact
                $contact = $orderAction->persistContact($datas, $contact, $em);

                //Récupération de l'entité devis
                $devis = new Devis();

                //Appel du service GMFDevisAction
                $devisAction = $this->container->get('gmf_devis.devisAction');

                //On défini la date du devis
                $devis = $devisAction->dateDevis($devis);

                // Création du numéro de devis
                $devis = $devisAction->numeroDevis($devis, $em);               

                 //Appel du service GMFDevisAction
                $emailAction = $this->container->get('gmf_devis.emailAction');

                //Création du PDF
                $devisPDF = $emailAction->generatePDF($contact, $modules, $devis);

                // Envoi du mail
                $email = $emailAction->sendMail($contact, $modules, $devis, $devisPDF);

                // On lies les entitiés ensemble et en envoie en bdd
                $devis = $devisAction->persistDevis($contact, $modules, $devis, $em);

                //return $this->redirectToRoute('gmf_devis_thanks');*/

                //return $this->render('GMFDevisBundle:Devis:devis.html.twig', array('modules'=>$modules, 'contact'=> $contact, 'devis' =>$devis));
               
            /*}
            else 
            { 
                $session->getFlashBag()->add('modules', 'Vous devez sélectionnez au moins un module');
            }*/
        }

    	// Affiche la page de formulaire
    	return $this->render('GMFDevisBundle:Devis:order.html.twig', array('form' => $form->createView()));
    }

    public function thanksAction()
    {
    	return $this->render('GMFDevisBundle:devis:thanks.html.twig');
    }
}