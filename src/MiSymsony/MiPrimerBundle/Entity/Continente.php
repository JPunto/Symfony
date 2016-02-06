<?php

namespace MiSymfony\MiPrimerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
* @ORM\Entity(repositoryClass="MiSymfony\MiPrimerBundle\Entity\Repositorios\ContinenteRepository")
*/
class Continente
{
	protected $id;
	protected $nombre;
	protected $paises;
}