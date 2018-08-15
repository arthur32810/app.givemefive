<?php
namespace GMF\DevisBundle\Services;

use Dompdf\Options;
use Dompdf\Dompdf;

class GMFEmailAction
 {
 	private $twig;

 	public function __construct($twig)
 	{
 		$this->twig = $twig;
 	}
 	
 	public function generatePDF()
 	{
 		$options = new Options();

 		$options->set('isRemoteEnabled', TRUE);

 		$dompdf= new Dompdf($options);

 		 $html = $this->twig->render('GMFDevisBundle:Devis:devis.html.twig');

	      $dompdf->loadHtml($html);

	      $dompdf->render();

	      $devis = $dompdf->output();

	      return $devis;
 	}
 }