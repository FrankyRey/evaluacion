<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AsignacionMateria
 *
 * @ORM\Table(name="asignacion_materia", indexes={@ORM\Index(name="fk_asignacion_materia_grupo1_idx", columns={"id_grupo"}), @ORM\Index(name="fk_asignacion_materia_profesor1_idx", columns={"profesor_matricula"}), @ORM\Index(name="fk_asignacion_materia_curricula1_idx", columns={"id_curricula"})})
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
     * @var \Curricula
     *
     * @ORM\ManyToOne(targetEntity="Curricula")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_curricula", referencedColumnName="id_curricula")
     * })
     */
    private $idCurricula;

    /**
     * @var \Grupo
     *
     * @ORM\ManyToOne(targetEntity="Grupo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_grupo", referencedColumnName="id_grupo")
     * })
     */
    private $idGrupo;

    /**
     * @var \Profesor
     *
     * @ORM\ManyToOne(targetEntity="Profesor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="profesor_matricula", referencedColumnName="matricula")
     * })
     */
    private $profesorMatricula;

    public function getIdAsignacionMateria(): ?int
    {
        return $this->idAsignacionMateria;
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

    public function getIdGrupo(): ?Grupo
    {
        return $this->idGrupo;
    }

    public function setIdGrupo(?Grupo $idGrupo): self
    {
        $this->idGrupo = $idGrupo;

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


}
