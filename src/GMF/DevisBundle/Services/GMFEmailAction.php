<?php
namespace GMF\DevisBundle\Services;

use Dompdf\Options;
use Dompdf\Dompdf;

class GMFEmailAction
 {
 	private $twig;
 	private $mailer;

 	public function __construct($twig, $mailer)
 	{
 		$this->twig = $twig;
 		$this->mailer = $mailer;
 	}
 	
 	public function generatePDF($contact, $modules, $devis)
 	{
 		$options = new Options();

 		$options->set('isRemoteEnabled', TRUE);

 		$dompdf= new Dompdf($options);

 		 $html = $this->twig->render('GMFDevisBundle:Devis:devis.html.twig', array('contact' => $contact, 'modules' =>$modules, 'devis'=>$devis));

	      $dompdf->loadHtml($html);

	      $dompdf->render();

	      $devisPDF = $dompdf->output();

	      return $devisPDF;
 	}

 	public function sendMail($contact, $modules, $devis, $devisPDF)
 	{
 		$message = (new \Swift_Message('Demande de devis - Modules GiveMeFive'))
        ->setFrom('accueil@givemefive.artdevelopp.fr')
        ->setTo($contact->getEmail())
        ->setBody(
                $this->twig->render( 'GMFDevisBundle:Devis:email.html.twig'), 'text/html')
        ->attach(new \Swift_Attachment($devisPDF, 'devis.pdf'));

      //Envoi du mail
      $this->mailer->send($message);
 	}
 }