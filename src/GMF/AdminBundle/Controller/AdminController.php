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

    public function delete_devisAction(Request $request, $id)
    {
    	$em = $this
		  ->getDoctrine()
		  ->getManager();

		$devis = $em->getRepository('GMFDevisBundle:Devis')->find($id);

		$contact = $em->getRepository('GMFDevisBundle:Contact')->find($devis->getContact()->getId());

		$modules = $em->getRepository('GMFDevisBundle:Modules')->find($devis->getModules()->getId());

		$em->remove($devis);
		$em->remove($contact);
		$em->remove($modules);
		$em->flush();

		$session = $request->getSession();
		$session->getFlashBag()->add('success', 'Le devis a bien été supprimé');

		return $this->redirectToRoute('gmf_admin_home');
    }
}
