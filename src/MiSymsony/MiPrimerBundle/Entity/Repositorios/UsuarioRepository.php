<?php

namespace MiSymfony\MiPrimerBundle\Entity\Repositorios;

use Doctrine\ORM\EntityRepository;

class UsuarioRepository extends EntityRepository
{
	// Devuelve todos los usuarios ordenados por estado y por orden alfabético según nombre y apellidos o mail
	public function getAllOrdenAlfabeticoPorEstados()
	{
		return $this->getEntityManager()
			->createQuery('SELECT u FROM MiSymfony\MiPrimerBundle\Entity\Usuario u
							ORDER BY u.estado_usuario ASC, u.nombre ASC, u.apellidos ASC, u.mail')
			->getResult();
	}
	
	// Devuelve un valor entero que es el número total de usuarios registrados en la aplicación
	public function getCountUsuarios()
	{
		return $this->getEntityManager()
			->createQuery('SELECT COUNT(u) FROM MiSymfony\MiPrimerBundle\Entity\Usuario u')
			->getSingleScalarResult();
	}
	
	// Devuelve el conjunto de usuarios asociados a un grupo determinado
	public function getUsuariosGrupo($grupo)
	{
		return $this->getEntityManager()
			->createQuery('SELECT u FROM MiSymfony\MiPrimerBundle\Entity\Usuario u
							JOIN u.grupos g
							WHERE g.id = ?1
							ORDER BY u.nombre ASC, u.apellidos ASC')
			->setParameter(1, $grupo)
			->getResult();
	}
	
	// Devuelve un valor entero que es el número de usuarios asociados a un grupo en concreto
	public function getCountUsuariosGrupo($grupo)
	{
		return $this->getEntityManager()
			->createQuery('SELECT COUNT(u) FROM MiSymfony\MiPrimerBundle\Entity\Usuario u
							JOIN u.grupos g
							WHERE g.id = ?1
							ORDER BY u.nombre ASC, u.apellidos ASC')
			->setParameter(1, $grupo)
			->getSingleScalarResult();
	}
		
	// Devuelve el usuario, si existe, asociado al e-mail pasado por parámetro
	public function getUsuarioPorMail($mail)
	{
		return $this->getEntityManager()
			->createQuery('SELECT u FROM MiSymfony\MiPrimerBundle\Entity\Usuario u
							WHERE u.mail = ?1')
			->setParameter(1, $mail)
			->getResult();
	}
	
}
