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

		$em->persist($modules);
		$em->flush();
	}
}