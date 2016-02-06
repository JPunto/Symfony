<?php

namespace MiSymfony\MiPrimerBundle\Entity\Repositorios;

use Doctrine\ORM\EntityRepository;

class ContinenteRepository extends EntityRepository
{
	// Devuelve todos los continentes ordenados alfabéticamente
	public function getAllOrdenAlfabetico()
	{
		return $this->getEntityManager()
			->createQuery('SELECT p FROM MiSymfony\MiPrimerBundle\Entity\Pais p
							ORDER BY p.nombre ASC')
			->getResult();
	}
	
	// Devuelve el continente, si existe, asociado al nombre pasado por parámetro
	public function getContinentePorNombre($nombre)
	{
		return $this->getEntityManager()
			->createQuery('SELECT c FROM MiSymfony\MiPrimerBundle\Entity\Continente c
							WHERE c.nombre = ?1')
			->setParameter(1, $nombre)
			->getSingleResult();
	}
}
