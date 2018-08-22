<?php

namespace GMF\DevisBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use GMF\DevisBundle\Entity\Modules;

class LoadModules implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		/* Modules Fidélité*/
		$module = new Modules();
		$module->setType('Produit');
		$module->setName('Fidélité client');
		$module->setDescription('Grâce à ce module, vous pouvez enfin récompenser votre meilleure clientèle avec un programme de fidélité sur-mesure. 						Choisissez vous-même les avantages à proposer à vos clients. Réductions, promotions sur des produits, créneaux horaires privilégiés ou évènements spéciaux, autant de petits plaisirs qui feront la joie de vos meilleurs clients (et même des pires !). Avec ce module, fini les cartes d’adhérents perdues et vive les clients heureux. 
								Créer un lien fort avec votre clientèle, est la marque des grands entrepreneurs');
		$module->setPrice(29.99);
		$manager->persist($module);

		/* Module Réservation*/
		$module = new Modules();
		$module->setType('Produit');
		$module->setName('Réservation');
		$module->setDescription('Le système de réservation, relie en temps réel, l’application et l’agenda de votre société. Que vous soyez une structure d’activité de loisirs, ou un complexe sportif, ce module s’adapte à vos exigences. 
			Grâce à son choix multiple (heure, demi-journée, journée, payante ou gratuite, seul ou groupe), vos clients peuvent réserver depuis leur mobile à n’importe quelle heure de la journée et de la nuit. Simple et efficace, ce module vous permet de vous libérer de cette tâche longue et fastidieuse. 
			Toutes autres demandes seront examinées et réalisées sur devis.');
		$module->setPrice(59.99);
		$manager->persist($module);

		/* Module Vente de produit */
		$module = new Modules();
		$module->setType('Produit');
		$module->setName('Vente de produit');
		$module->setDescription('Ce module permet de créer vous-même une boutique en ligne. Simple et intuitif, augmentez votre chiffre d’affaire avec vos produits, accessoires et autres produits dérivés de votre société. Très complet, ce dispositif comblera vos attentes. Gestion des commandes et des stocks, promotions, livraison, ce module est un véritable plus, pour vous permettre de vous développer sans connaissances informatiques, ni personnel supplémentaire dédié à cette activité. (Attention la machine à café n’est pas comprise dans l’abonnement de ce module)');
		$module->setPrice(49.99);
		$manager->persist($module);

		/* Module Carte Interractive */
		$module = new Modules();
		$module->setType('Produit');
		$module->setName('Carte Interractive');
		$module->setDescription('Ce module permet de créer un plan 2D de votre activité commerciale. Il est interactif, et dispose d’une fonction description qui permet à vos clients de visualiser chaque appareil, atelier ou manège de votre société. Vos clients voient par exemple, le niveau de difficulté, l’âge minimum requis pour son utilisation, et un système de notation qu’ils peuvent remplir eux-mêmes. Ceci permet de connaître les attentes, et de s’adapter au mieux à leur besoins pour leur plus grand plaisir.');
		$module->setPrice(39.99);
		$manager->persist($module);

		$manager->flush();
	}
}