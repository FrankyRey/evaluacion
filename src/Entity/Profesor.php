<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profesor
 *
 * @ORM\Table(name="profesor", indexes={@ORM\Index(name="fk_profesor_funcion_docente1_idx", columns={"id_funcion_docente"}), @ORM\Index(name="fk_profesor_estatus_profesor1_idx", columns={"id_estatus_profesor"})})
 * @ORM\Entity
 */
class Profesor
{
    /**
     * @var int
     *
     * @ORM\Column(name="matricula", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $matricula;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_completo", type="string", length=200, nullable=false)
     */
    private $nombreCompleto;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_nacimiento", type="date", nullable=true)
     */
    private $fechaNacimiento;

    /**
     * @var int|null
     *
     * @ORM\Column(name="edad", type="integer", nullable=true)
     */
    private $edad;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=1, nullable=false)
     */
    private $sexo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rfc", type="string", length=13, nullable=true)
     */
    private $rfc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="curp", type="string", length=18, nullable=true)
     */
    private $curp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_alta", type="date", nullable=false)
     */
    private $fechaAlta;

    /**
     * @var string
     *
     * @ORM\Column(name="correo_electronico", type="string", length=150, nullable=false)
     */
    private $correoElectronico;

    /**
     * @var \EstatusProfesor
     *
     * @ORM\ManyToOne(targetEntity="EstatusProfesor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estatus_profesor", referencedColumnName="id_estatus_profesor")
     * })
     */
    private $idEstatusProfesor;

    /**
     * @var \FuncionDocente
     *
     * @ORM\ManyToOne(targetEntity="FuncionDocente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_funcion_docente", referencedColumnName="id_funcion_docente")
     * })
     */
    private $idFuncionDocente;

    public function getMatricula(): ?int
    {
        return $this->matricula;
    }

    public function getNombreCompleto(): ?string
    {
        return $this->nombreCompleto;
    }

    public function setNombreCompleto(string $nombreCompleto): self
    {
        $this->nombreCompleto = $nombreCompleto;

        return $this;
    }

    public function getFechaNacimiento(): ?\DateTimeInterface
    {
        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento(?\DateTimeInterface $fechaNacimiento): self
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    public function getEdad(): ?int
    {
        return $this->edad;
    }

    public function setEdad(?int $edad): self
    {
        $this->edad = $edad;

        return $this;
    }

    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    public function setSexo(string $sexo): self
    {
        $this->sexo = $sexo;

        return $this;
    }

    public function getRfc(): ?string
    {
        return $this->rfc;
    }

    public function setRfc(?string $rfc): self
    {
        $this->rfc = $rfc;

        return $this;
    }

    public function getCurp(): ?string
    {
        return $this->curp;
    }

    public function setCurp(?string $curp): self
    {
        $this->curp = $curp;

        return $this;
    }

    public function getFechaAlta(): ?\DateTimeInterface
    {
        return $this->fechaAlta;
    }

    public function setFechaAlta(\DateTimeInterface $fechaAlta): self
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    public function getCorreoElectronico(): ?string
    {
        return $this->correoElectronico;
    }

    public function setCorreoElectronico(string $correoElectronico): self
    {
        $this->correoElectronico = $correoElectronico;

        return $this;
    }

    public function getIdEstatusProfesor(): ?EstatusProfesor
    {
        return $this->idEstatusProfesor;
    }

    public function setIdEstatusProfesor(?EstatusProfesor $idEstatusProfesor): self
    {
        $this->idEstatusProfesor = $idEstatusProfesor;

        return $this;
    }

    public function getIdFuncionDocente(): ?FuncionDocente
    {
        return $this->idFuncionDocente;
    }

    public function setIdFuncionDocente(?FuncionDocente $idFuncionDocente): self
    {
        $this->idFuncionDocente = $idFuncionDocente;

        return $this;
    }


}
