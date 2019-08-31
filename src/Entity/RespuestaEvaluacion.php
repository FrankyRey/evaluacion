<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RespuestaEvaluacion
 *
 * @ORM\Table(name="respuesta_evaluacion", indexes={@ORM\Index(name="fk_respuesta_evaluacion_asignacion_materia", columns={"id_asignacion_materia"}), @ORM\Index(name="fk_respuesta_evaluacion_alumno1_idx", columns={"alumno_matricula"}), @ORM\Index(name="fk_respuesta_evaluacion_opcion_pregunta1_idx", columns={"id_opcion_pregunta"})})
 * @ORM\Entity
 */
class RespuestaEvaluacion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_respuesta_evaluacion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRespuestaEvaluacion;

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

    /**
     * @var \OpcionPregunta
     *
     * @ORM\ManyToOne(targetEntity="OpcionPregunta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_opcion_pregunta", referencedColumnName="id_opcion_pregunta")
     * })
     */
    private $idOpcionPregunta;

    public function getIdRespuestaEvaluacion(): ?int
    {
        return $this->idRespuestaEvaluacion;
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

    public function getIdOpcionPregunta(): ?OpcionPregunta
    {
        return $this->idOpcionPregunta;
    }

    public function setIdOpcionPregunta(?OpcionPregunta $idOpcionPregunta): self
    {
        $this->idOpcionPregunta = $idOpcionPregunta;

        return $this;
    }


}
