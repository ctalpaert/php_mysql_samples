<?php

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;

class CustomerRepository extends EntityRepository
{

	public function count()
	{
		$dql = "SELECT count(c.id) AS people FROM Customer c";
		$result = $this->getEntityManager()->createQuery($dql)->getScalarResult();
		return $result[0]['people'];
	}

	public function mostPopularFirstnames()
	{
		$em = $this->getEntityManager();
		$rsm = new ResultSetMapping;
		$rsm->addEntityResult('Customer', 'c');
		$rsm->addScalarResult('firstname', 'firstname');
		$rsm->addScalarResult('people', 'people');
		$query = $em->createNativeQuery('SELECT c.firstname, COUNT(c.id) AS people FROM customers c GROUP BY c.firstname ORDER BY people DESC LIMIT 10', $rsm);
		return $query->getResult();
	}

}