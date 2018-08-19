<?php

namespace GMF\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
	public function devisAction()
	{
		$repository = $this
		  ->getDoctrine()
		  ->getManager()
		  ->getRepository('GMFDevisBundle:Devis')
		;

		$devis = $repository->findAll();
		return $this->render('GMFAdminBundle:admin:devis.html.twig', array('list_devis'=> $devis));
	}

    public function view_devisAction($id)
    {
       // Récupérayion des informations de la bdd 
		$repository = $this
		  ->getDoctrine()
		  ->getManager()
		  ->getRepository('GMFDevisBundle:Devis')
		;

		$devis = $repository->find($id);
		$contact = $devis->getContact();
		$modules = $devis->getModules();

		return $this->render('GMFAdminBundle:Admin:devisPDF.html.twig', array('devis'=>$devis, 'contact'=>$contact, 'modules'=>$modules));
		
    }

    public function delete_devisAction($id)
    {
    	$em = $this
		  ->getDoctrine()
		  ->getManager();

		$devis = $em->getRepository('GMFDevisBundle:Devis')->find($id);

		$em->remove($devis);
		$em->flush();

		return $this->redirectToRoute('gmf_admin_home');
    }
}
