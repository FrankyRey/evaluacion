<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Curricula
 *
 * @ORM\Table(name="curricula", indexes={@ORM\Index(name="fk_curricula_oferta_academica1_idx", columns={"id_oferta_academica"}), @ORM\Index(name="fk_curricula_plan_estudio1_idx", columns={"id_plan_estudio"}), @ORM\Index(name="fk_curricula_materia1_idx", columns={"id_materia"})})
 * @ORM\Entity
 */
class Curricula
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_curricula", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCurricula;

    /**
     * @var int
     *
     * @ORM\Column(name="periodo", type="integer", nullable=false)
     */
    private $periodo;

    /**
     * @var \PlanEstudio
     *
     * @ORM\ManyToOne(targetEntity="PlanEstudio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_plan_estudio", referencedColumnName="id_plan_estudio")
     * })
     */
    private $idPlanEstudio;

    /**
     * @var \Materia
     *
     * @ORM\ManyToOne(targetEntity="Materia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_materia", referencedColumnName="id_materia")
     * })
     */
    private $idMateria;

    /**
     * @var \OfertaAcademica
     *
     * @ORM\ManyToOne(targetEntity="OfertaAcademica")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_oferta_academica", referencedColumnName="id_oferta_academica")
     * })
     */
    private $idOfertaAcademica;

    public function getIdCurricula(): ?int
    {
        return $this->idCurricula;
    }

    public function getPeriodo(): ?int
    {
        return $this->periodo;
    }

    public function setPeriodo(int $periodo): self
    {
        $this->periodo = $periodo;

        return $this;
    }

    public function getIdPlanEstudio(): ?PlanEstudio
    {
        return $this->idPlanEstudio;
    }

    public function setIdPlanEstudio(?PlanEstudio $idPlanEstudio): self
    {
        $this->idPlanEstudio = $idPlanEstudio;

        return $this;
    }

    public function getIdMateria(): ?Materia
    {
        return $this->idMateria;
    }

    public function setIdMateria(?Materia $idMateria): self
    {
        $this->idMateria = $idMateria;

        return $this;
    }

    public function getIdOfertaAcademica(): ?OfertaAcademica
    {
        return $this->idOfertaAcademica;
    }

    public function setIdOfertaAcademica(?OfertaAcademica $idOfertaAcademica): self
    {
        $this->idOfertaAcademica = $idOfertaAcademica;

        return $this;
    }


}
