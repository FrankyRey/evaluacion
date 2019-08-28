<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlanEstudio
 *
 * @ORM\Table(name="plan_estudio", indexes={@ORM\Index(name="fk_plan_estudio_incorporacion1_idx", columns={"id_incorporacion"}), @ORM\Index(name="fk_plan_estudio_periodicidad1_idx", columns={"id_periodicidad"})})
 * @ORM\Entity
 */
class PlanEstudio
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_plan_estudio", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPlanEstudio;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_plan_estudio", type="string", length=100, nullable=false)
     */
    private $nombrePlanEstudio;

    /**
     * @var \Incorporacion
     *
     * @ORM\ManyToOne(targetEntity="Incorporacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_incorporacion", referencedColumnName="id_incorporacion")
     * })
     */
    private $idIncorporacion;

    /**
     * @var \Periodicidad
     *
     * @ORM\ManyToOne(targetEntity="Periodicidad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_periodicidad", referencedColumnName="id_periodicidad")
     * })
     */
    private $idPeriodicidad;

    public function getIdPlanEstudio(): ?int
    {
        return $this->idPlanEstudio;
    }

    public function getNombrePlanEstudio(): ?string
    {
        return $this->nombrePlanEstudio;
    }

    public function setNombrePlanEstudio(string $nombrePlanEstudio): self
    {
        $this->nombrePlanEstudio = $nombrePlanEstudio;

        return $this;
    }

    public function getIdIncorporacion(): ?Incorporacion
    {
        return $this->idIncorporacion;
    }

    public function setIdIncorporacion(?Incorporacion $idIncorporacion): self
    {
        $this->idIncorporacion = $idIncorporacion;

        return $this;
    }

    public function getIdPeriodicidad(): ?Periodicidad
    {
        return $this->idPeriodicidad;
    }

    public function setIdPeriodicidad(?Periodicidad $idPeriodicidad): self
    {
        $this->idPeriodicidad = $idPeriodicidad;

        return $this;
    }


}
