<?php

namespace MiSymfony\MiPrimerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

/**
* @ORM\Entity()
*/
class Rol
{
	/**
	* @ORM\Id
	* @ORM\Column(type="integer")
	* @ORM\GeneratedValue(strategy="IDENTITY")
	*/
	protected $id;
	/**
	* @ORM\Column(type="text", length=20)
	*/
	protected $name;
	/**
	* @ORM\Column(type="text", length=20)
	*/
	protected $texto;
	/**
	* @ORM\Column(type="integer")
	*/
	protected $nivel;
	/**
	* @ORM\OneToMany(targetEntity="Usuario", mappedBy="roles")
	*/
	protected $usuarios;

}