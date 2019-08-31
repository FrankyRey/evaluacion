<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pregunta
 *
 * @ORM\Table(name="pregunta", indexes={@ORM\Index(name="fk_pregunta_examen1_idx", columns={"id_evaluacion"})})
 * @ORM\Entity
 */
class Pregunta
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_pregunta", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPregunta;

    /**
     * @var string
     *
     * @ORM\Column(name="texto_pregunta", type="string", length=250, nullable=false)
     */
    private $textoPregunta;

    /**
     * @var \Evaluacion
     *
     * @ORM\ManyToOne(targetEntity="Evaluacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_evaluacion", referencedColumnName="id_evaluacion")
     * })
     */
    private $idEvaluacion;

    public function getIdPregunta(): ?int
    {
        return $this->idPregunta;
    }

    public function getTextoPregunta(): ?string
    {
        return $this->textoPregunta;
    }

    public function setTextoPregunta(string $textoPregunta): self
    {
        $this->textoPregunta = $textoPregunta;

        return $this;
    }

    public function getIdEvaluacion(): ?Evaluacion
    {
        return $this->idEvaluacion;
    }

    public function setIdEvaluacion(?Evaluacion $idEvaluacion): self
    {
        $this->idEvaluacion = $idEvaluacion;

        return $this;
    }


}
