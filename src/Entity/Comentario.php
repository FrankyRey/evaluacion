<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comentario
 *
 * @ORM\Table(name="comentario", indexes={@ORM\Index(name="fk_comentario_asignacion_materia1_idx", columns={"id_asignacion_materia"}), @ORM\Index(name="fk_comentario_alumno1_idx", columns={"alumno_matricula"})})
 * @ORM\Entity
 */
class Comentario
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_comentario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idComentario;

    /**
     * @var string
     *
     * @ORM\Column(name="comentario", type="string", length=250, nullable=true)
     */
    private $comentario;

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
     * @var \AsignacionMateria
     *
     * @ORM\ManyToOne(targetEntity="AsignacionMateria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_asignacion_materia", referencedColumnName="id_asignacion_materia")
     * })
     */
    private $idAsignacionMateria;

    public function getIdRespuestaEvaluacion(): ?int
    {
        return $this->idRespuestaEvaluacion;
    }

    public function getComentario(): ?string
    {
        return $this->comentario;
    }

    public function setComentario(string $comentario)
    {
        $this->comentario = $comentario;

        return $this;
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

    public function getIdAsignacionMateria(): ?AsignacionMateria
    {
        return $this->idAsignacionMateria;
    }

    public function setIdAsignacionMateria(?AsignacionMateria $idAsignacionMateria): self
    {
        $this->idAsignacionMateria = $idAsignacionMateria;

        return $this;
    }


}
