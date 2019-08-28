<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alumno
 *
 * @ORM\Table(name="alumno", indexes={@ORM\Index(name="fk_alumno_estatus_alumno1_idx", columns={"id_estatus_alumno"}), @ORM\Index(name="fk_alumno_grupo1_idx", columns={"id_grupo"})})
 * @ORM\Entity
 */
class Alumno
{
    /**
     * @var string
     *
     * @ORM\Column(name="matricula", type="string", length=20, nullable=false)
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nacimiento", type="date", nullable=false)
     */
    private $fechaNacimiento;

    /**
     * @var int|null
     *
     * @ORM\Column(name="edad", type="integer", nullable=true)
     */
    private $edad;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sexo", type="string", length=1, nullable=true)
     */
    private $sexo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ciclo_escolar", type="string", length=16, nullable=true)
     */
    private $cicloEscolar;

    /**
     * @var \EstatusAlumno
     *
     * @ORM\ManyToOne(targetEntity="EstatusAlumno")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estatus_alumno", referencedColumnName="id_estatus_alumno")
     * })
     */
    private $idEstatusAlumno;

    /**
     * @var \Grupo
     *
     * @ORM\ManyToOne(targetEntity="Grupo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_grupo", referencedColumnName="id_grupo")
     * })
     */
    private $idGrupo;

    public function getMatricula(): ?string
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

    public function setFechaNacimiento(\DateTimeInterface $fechaNacimiento): self
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

    public function setSexo(?string $sexo): self
    {
        $this->sexo = $sexo;

        return $this;
    }

    public function getCicloEscolar(): ?string
    {
        return $this->cicloEscolar;
    }

    public function setCicloEscolar(?string $cicloEscolar): self
    {
        $this->cicloEscolar = $cicloEscolar;

        return $this;
    }

    public function getIdEstatusAlumno(): ?EstatusAlumno
    {
        return $this->idEstatusAlumno;
    }

    public function setIdEstatusAlumno(?EstatusAlumno $idEstatusAlumno): self
    {
        $this->idEstatusAlumno = $idEstatusAlumno;

        return $this;
    }

    public function getIdGrupo(): ?Grupo
    {
        return $this->idGrupo;
    }

    public function setIdGrupo(?Grupo $idGrupo): self
    {
        $this->idGrupo = $idGrupo;

        return $this;
    }


}
