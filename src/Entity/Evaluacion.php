<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evaluacion
 *
 * @ORM\Table(name="evaluacion")
 * @ORM\Entity
 */
class Evaluacion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_evaluacion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvaluacion;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_evaluacion", type="string", length=100, nullable=false)
     */
    private $nombreEvaluacion;

    public function getIdEvaluacion(): ?int
    {
        return $this->idEvaluacion;
    }

    public function getNombreEvaluacion(): ?string
    {
        return $this->nombreEvaluacion;
    }

    public function setNombreEvaluacion(string $nombreEvaluacion): self
    {
        $this->nombreEvaluacion = $nombreEvaluacion;

        return $this;
    }


}
