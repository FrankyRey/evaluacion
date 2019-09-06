<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AsignacionMateria
 *
 * @ORM\Table(name="asignacion_materia", indexes={@ORM\Index(name="fk_asignacion_materia_grupo1_idx", columns={"id_grupo"}), @ORM\Index(name="fk_asignacion_materia_curricula1_idx", columns={"id_curricula"}), @ORM\Index(name="fk_asignacion_materia_profesor1_idx", columns={"profesor_matricula"})})
 * @ORM\Entity
 */
class AsignacionMateria
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_asignacion_materia", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAsignacionMateria;

    /**
     * @var \Alumno
     *
     * @ORM\ManyToOne(targetEntity="Alumno")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="alumno_matricula", referencedColumnName="matricula")
     * })
     */
    private $alumnoMatricula;

    /**
     * @var \Profesor
     *
     * @ORM\ManyToOne(targetEntity="Profesor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="profesor_matricula", referencedColumnName="matricula")
     * })
     */
    private $profesorMatricula;

    /**
     * @var \Curricula
     *
     * @ORM\ManyToOne(targetEntity="Curricula")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_curricula", referencedColumnName="id_curricula")
     * })
     */
    private $idCurricula;

    public function getIdAsignacionMateria(): ?int
    {
        return $this->idAsignacionMateria;
    }

    public function getAlumnoMatricula(): ?Alumno
    {
        return $this->alumnoMatricula;
    }

    public function setAlumnoMatricula(?Alumno $alumnoMatricula): self
    {
        $this->alumnoMatricula = $alumnoMatricula;

        return $this;
    }

    public function getProfesorMatricula(): ?Profesor
    {
        return $this->profesorMatricula;
    }

    public function setProfesorMatricula(?Profesor $profesorMatricula): self
    {
        $this->profesorMatricula = $profesorMatricula;

        return $this;
    }

    public function getIdCurricula(): ?Curricula
    {
        return $this->idCurricula;
    }

    public function setIdCurricula(?Curricula $idCurricula): self
    {
        $this->idCurricula = $idCurricula;

        return $this;
    }


}
