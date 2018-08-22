<?php
namespace GMF\DevisBundle\Services;

use DateTime;
use DateInterval;

class GMFDevisAction
{
	public function dateDevis($devis)
	{
		// date du jour
		$date = new DateTime();
		$devis->setDate($date);

		// date d'expiration de devis (+3 mois)
		$deadline = new DateTime();
		$deadline = $deadline->add(new DateInterval('P3M'));
		$devis->setDeadline($deadline);

		return $devis;
	}

	public function numeroDevis($devis, $em)
	{
		 $unique_code ='';

	    while($unique_code != 'yes')
	    {

	      $code = "";
	      $chaine = "0123456789";

	      for($i=0; $i<5; $i++) {
	        $code .= $chaine[rand()%strlen($chaine)];
	      }

	      $code = 'GMF'.$code;

	      $exist_code = $em
	      ->getRepository('GMFDevisBundle:Devis')
	      ->findBynumero($code);

	      $exist_code = count($exist_code);

	      if($exist_code > 0)
	      {
	        $unique_code='no';
	      }
	      else
	      {
	        $unique_code='yes';
	      }

	    }

	    return $devis->setNumero($code);
	}

	public function persistDevis($contact, $modules, $devis, $em)
	{
		$devis->setContact($contact);
		
		foreach ($modules as $module) {
			$devis->addModule($module);
		}

		$em->persist($devis);
		$em->flush();
	}
}