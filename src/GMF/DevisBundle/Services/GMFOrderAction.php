<?php

namespace GMF\DevisBundle\Services;

class GMFOrderAction
{
	public function modulesNotNull($modules)
	{

		if(count($modules)==0)
        {
        	// L'array modules est null
            return false;
        }
        else 
        {
            return true;
        }
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
