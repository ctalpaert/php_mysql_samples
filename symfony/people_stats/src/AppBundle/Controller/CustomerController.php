<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CustomerController extends Controller {
	
	private $_em;
	
	public function __construct(&$em)
	{
		$this->_em = &$em;
	}

	public function getCount()
	{
		$repository = $this->_em->getRepository('AppBundle:Customer');
		return $repository->count();
	}

	public function getMostPopularFirstnames()
	{
		$repository = $this->_em->getRepository('AppBundle:Customer');
		return $repository->mostPopularFirstnames();
	}
}