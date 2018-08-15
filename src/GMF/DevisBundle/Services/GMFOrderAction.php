<?php

namespace GMF\DevisBundle\Services;

class GMFOrderAction
{
	public function modulesNotNull($data)
	{
		$modules = $data['modules'];

		if($modules == null)
        {
            return false;
        }
        else 
        {
            return true;
        }
	}

	public function persistModules($datas, $modules, $em)
	{
		foreach ($datas as $data) {
			switch($data)
			{
				case 'reservation':
					$modules->setReservation(true);
					break;

				case 'fidelite':
					$modules->setFidelite(true);
					break;

				case 'carte':
					$modules->setCarte(true);
					break;

				case 'produits':
					$modules->setVente(true);
					break;
			}
		}

		return $modules;
	}

	public function persistContact($data, $contact, $em)
	{
		$contact->setName($data['name']);
		$contact->setSurname($data['surname']);
		$contact->setCompany($data['company']);
		$contact->setSiret($data['siret']);
		$contact->setAdress($data['adress']);
		$contact->setZipCode($data['zipCode']);
		$contact->setCity($data['city']);
		$contact->setEmail($data['email']);
		$contact->setPhone($data['phone']);

		return $contact;
	}
}
