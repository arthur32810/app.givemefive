<?php

namespace GMF\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use GMF\DevisBundle\Entity\Devis;
use GMF\DevisBundle\Entity\Modules;
use GMF\DevisBundle\Form\ModulesType;

class AdminController extends Controller
{
	public function devisAction()
	{
		$repository = $this
		  ->getDoctrine()
		  ->getManager()
		  ->getRepository('GMFDevisBundle:Devis')
		;

		$list_devis = $repository->findAll();
		return $this->render('GMFAdminBundle:admin:devis.html.twig', array('list_devis'=> $list_devis));
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

		  // On boucle sur les modules du devis pour les supprimer
	    foreach ($devis->getModules() as $module) {
	      $devis->removeModule($module);
	    }

		$contact = $em->getRepository('GMFDevisBundle:Contact')->find($devis->getContact()->getId());

		$em->remove($devis);
		$em->remove($contact);
		$em->flush();

		$session = $request->getSession();
		$session->getFlashBag()->add('success', 'Le devis a bien été supprimé');

		return $this->redirectToRoute('gmf_admin_home');
    }

    public function modulesAction()
    {
    	$em = $this
		  ->getDoctrine()
		  ->getManager();

		 $list_modules = $em->getRepository('GMFDevisBundle:Modules')->findAll();

		 return $this->render('GMFAdminBundle:Admin:modules.html.twig', array('list_modules'=>$list_modules)); 
    }

    public function modules_addAction(Request $request)
    {
    	$module = new Modules();
    	$form = $this->get('form.factory')->create(ModulesType::class, $module);

    	if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
	      
	      $em = $this->getDoctrine()->getManager();
	      $em->persist($module);
	      $em->flush();

	      $request->getSession()->getFlashBag()->add('success', 'Module bien enregistré.');

	      return $this->redirectToRoute('gmf_admin_modules');
	    }

	    return $this->render('GMFAdminBundle:Admin:moduleAdd.html.twig', array(
	      'form' => $form->createView(),
	    ));

    }

    public function modules_editAction(Request $request, $id)
    {
    	$em = $this->getDoctrine()->getManager();

	    $module = $em->getRepository('GMFDevisBundle:Modules')->find($id);

	    if (null === $module) {
	      throw new NotFoundHttpException("Le module d'id ".$id." n'existe pas.");
	    }

		$form = $this->get('form.factory')->create(ModulesType::class, $module);

	    if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
	     
	     // Inutile de persister ici, Doctrine connait déjà notre annonce
	      $em->flush();

	      $request->getSession()->getFlashBag()->add('success', 'Module bien modifié.');

	      return $this->redirectToRoute('gmf_admin_modules');
	    }

	    return $this->render('GMFAdminBundle:Admin:moduleEdit.html.twig', array(
	      'form'   => $form->createView(),
	    ));

    }

    public function modules_deleteAction(Request $request, $id)
    {
    	 $em = $this->getDoctrine()->getManager();
    	 $module = $em->getRepository('GMFDevisBundle:Modules')->find($id);

    	 $em->remove($module);
    	 $em->flush();

    	 $request->getSession()->getFlashBag()->add('success', 'Module supprimé !');

	      return $this->redirectToRoute('gmf_admin_modules');
    }

    public function usersAction()
    {
    	$userManager = $this->get('fos_user.user_manager');

		$list_users = $userManager->findUsers();

		return $this->render('GMFAdminBundle:Admin:users.html.twig', array('list_users'=>$list_users));
    }

    public function user_editAction($username)
    {
    	$userManager = $this->get('fos_user.user_manager');

    	$user = $userManager->findUserBy(array('username'=>$username));
    	$user->setRoles('ROLE_EDITEUR');
    	$userManager->upateUser($user);

    	$session = $request->getSession();
		$session->getFlashBag()->add('success', 'L\'utilisateur a bien été modifié');

		return $this->redirectToRoute('gmf_admin_users');
    }

    public function delete_userAction(Request $request, $username)
    {
		$userManager = $this->get('fos_user.user_manager');

		$user = $userManager->findUserBy(array('username'=> $username));

		$userManager->deleteUser($user);

		$session = $request->getSession();
		$session->getFlashBag()->add('success', 'L\'utilisateur a bien été supprimé');

		return $this->redirectToRoute('gmf_admin_users');

    }
}
