<?php

namespace MiSymfony\MiPrimerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
* @ORM\Entity(repositoryClass="MiSymfony\MiPrimerBundle\Entity\Repositorios\UsuarioRepository")
* @UniqueEntity(fields="mail", message="El campo 'e-mail' ya está en uso")
*/
class Usuario
{
	/**
	* @ORM\Id
	* @ORM\Column(type="integer")
	* @ORM\GeneratedValue(strategy="IDENTITY")
	*/
	protected $id;
	/**
	* @ORM\Column(type="string", nullable=true)
	* @Assert\NotBlank(message="El campo 'Nombre' es obligatorio")
	* @Assert\Regex(pattern="/^[a-zA-Z ñÑáÁéÉíÍóÓúÚü]+$/", message="El campo 'Nombre' es inválido")
	*/
	protected $nombre;
	/**
	* @ORM\Column(type="string", nullable=true)
	* @Assert\NotBlank(message="El campo 'Apellidos' es obligatorio")
	* @Assert\Regex(pattern="/^[a-zA-Z ñÑáÁéÉíÍóÓúÚü]+$/", message="El campo 'Apellidos' es inválido")
	*/
	protected $apellidos;
	/**
	* @ORM\Column(type="string", unique=true)
	* @Assert\Email(message="El campo 'E-mail' es inválido")
	* @Assert\NotBlank(message="El campo 'E-mail' es obligatorio")
	*/
	protected $mail;
	/**
	* @ORM\Column(type="string", nullable=true)
	* @Assert\NotBlank(message="El campo 'Password' es obligatorio")
	* @Assert\MinLength(limit=12, message="El campo 'Password' debe tener como mínimo un carácter|El campo 'Password' debe tener como mínimo {{ limit }} caracteres")
	*/
	protected $password;
	/**
	* @ORM\Column(type="date", nullable=true)
	* @Assert\Date(message="El campo 'Fecha de nacimiento' debe ser una fecha correcta")
	*/
	protected $fecha_nacimiento;
	/**
	* @ORM\Column(type="string", length=1, nullable=true)
	* @Assert\Choice(choices={"H", "M"})
	*/
	protected $genero;
	/**
	* @ORM\ManyToOne(targetEntity="Rol", inversedBy="usuarios")
	* @ORM\JoinColumn(name="rol_id", referencedColumnName="id")
	*/
	protected $rol;
	/**
	* @ORM\ManyToMany(targetEntity="Grupo", inversedBy="usuarios")
	* @ORM\JoinTable(name="usuario_grupo",
	*      joinColumns={@ORM\JoinColumn(name="usuario_id", referencedColumnName="id")},
	*      inverseJoinColumns={@ORM\JoinColumn(name="grupo_id", referencedColumnName="id")}
	* )
	*/
	protected $grupos;
	
	/**
     * Get edad
     * Atributo derivado de la fecha de nacimiento
     * @return integer
     */
	public function getEdad()
    {
		if($this->fecha_nacimiento != null){
			$sFecha = $this->fecha_nacimiento->format('Y-m-d');
			list($Y,$m,$d) = explode("-",$sFecha);
        	return(date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y);
		}else{
			return null;
		}
    }

}