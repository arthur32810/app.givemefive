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
}