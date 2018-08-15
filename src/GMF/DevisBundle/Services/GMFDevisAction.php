<?php
namespace GMF\DevisBundle\Services;

class GMFDevisAction
{
	public function dateDevis($devis)
	{
		// date du jour
		$date = date('Y-m-d');
		$devis->setDate($date);

		// date d'expiration de devis (+3 mois)
		$deadline = date('Y-m-d', strtotime('+3month'));
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
}