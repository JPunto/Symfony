<?php

namespace MiSymfony\MiPrimerBundle\Entity\Repositorios;

use Doctrine\ORM\EntityRepository;

class GrupoRepository extends EntityRepository
{
	// Recupera todos los grupos existentes en orden alfabético
	public function getAllOrdenAlfabetico()
	{
		return $this->getEntityManager()
			->createQuery('SELECT g FROM MiSymfony\MiPrimerBundle\Entity\Grupo g
							ORDER BY g.nombre ASC')
			->getResult();
	}
	
	// Devuelve un valor entero que es el número de grupos existentes
	public function getCountGrupos()
	{
		return $this->getEntityManager()
			->createQuery('SELECT COUNT(g) FROM MiSymfony\MiPrimerBundle\Entity\Grupo g')
			->getSingleScalarResult();
	}

}
