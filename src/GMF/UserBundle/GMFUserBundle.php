<?php

namespace GMF\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class GMFUserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
