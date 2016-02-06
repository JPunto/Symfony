<?php

namespace MiSymfony\MiPrimerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

/**
* @ORM\Entity(repositoryClass="MiSymfony\MiPrimerBundle\Entity\Repositorios\GrupoRepository")
*/
class Grupo
{
	/**
	* @ORM\Id
	* @ORM\Column(type="integer")
	* @ORM\GeneratedValue(strategy="IDENTITY")
	*/
	protected $id;
	/**
	* @ORM\Column(type="string")
	* @Assert\NotBlank(message="El campo 'Nombre' es obligatorio")
	*/
	protected $nombre;
	/**
	* @ORM\Column(type="text", nullable=true)
	*/
	protected $descripcion;
	/**
	* @ORM\ManyToMany(targetEntity="Usuario", mappedBy="grupos")
	*/
	protected $usuarios;

}