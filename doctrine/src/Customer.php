<?php

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity(repositoryClass="CustomerRepository")
 * @Table(name="customers")
 */
class Customer
{
	/**
	 * @Id @Column(type="integer")
	 * @GeneratedValue
	 * @var int
	 */
	protected $id;
	/**
	 * @Column(type="string")
	 * @var string
	 */
	protected $firstname;

	public function getId()
	{
		return $this->id;
	}

	public function getFirstname()
	{
		return $this->firstname;
	}

	public function setFirstname($firstname)
	{
		$this->firstname = $firstname;
	}

}