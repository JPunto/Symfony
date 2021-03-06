<?php

namespace MiSymfony\MiPrimerBundle\Entity\Repositorios;

use Doctrine\ORM\EntityRepository;

/**
 * PaisRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PaisRepository extends EntityRepository
{
	// Devuelve todos los paises ordenados por orden alfabéticamente
	public function getAllOrdenAlfabetico()
	{
		return $this->getEntityManager()
			->createQuery('SELECT p FROM MiSymfony\MiPrimerBundle\Entity\Pais p
							ORDER BY p.nombre ASC')
			->getResult();
	}
	
	// Devuelve el conjunto de paises asociados a un continente determinado
	public function getPaisesContinente($continente)
	{
		return $this->getEntityManager()
			->createQuery('SELECT p FROM MiSymfony\MiPrimerBundle\Entity\Pais p
							JOIN p.continente c
							WHERE c.id = ?1
							ORDER BY p.nombre ASC')
			->setParameter(1, $continente)
			->getResult();
	}
}
