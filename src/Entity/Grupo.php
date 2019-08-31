<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grupo
 *
 * @ORM\Table(name="grupo", indexes={@ORM\Index(name="fk_grupo_turno1_idx", columns={"id_turno"}), @ORM\Index(name="fk_grupo_oferta_academica1_idx", columns={"id_oferta_academica"})})
 * @ORM\Entity
 */
class Grupo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_grupo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idGrupo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_grupo", type="string", length=10, nullable=false)
     */
    private $nombreGrupo;

    /**
     * @var int|null
     *
     * @ORM\Column(name="periodo_grupo", type="integer", nullable=true)
     */
    private $periodoGrupo;

    /**
     * @var \Turno
     *
     * @ORM\ManyToOne(targetEntity="Turno")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_turno", referencedColumnName="id_turno")
     * })
     */
    private $idTurno;

    /**
     * @var \OfertaAcademica
     *
     * @ORM\ManyToOne(targetEntity="OfertaAcademica")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_oferta_academica", referencedColumnName="id_oferta_academica")
     * })
     */
    private $idOfertaAcademica;

    public function getIdGrupo(): ?int
    {
        return $this->idGrupo;
    }

    public function getNombreGrupo(): ?string
    {
        return $this->nombreGrupo;
    }

    public function setNombreGrupo(string $nombreGrupo): self
    {
        $this->nombreGrupo = $nombreGrupo;

        return $this;
    }

    public function getPeriodoGrupo(): ?int
    {
        return $this->periodoGrupo;
    }

    public function setPeriodoGrupo(?int $periodoGrupo): self
    {
        $this->periodoGrupo = $periodoGrupo;

        return $this;
    }

    public function getIdTurno(): ?Turno
    {
        return $this->idTurno;
    }

    public function setIdTurno(?Turno $idTurno): self
    {
        $this->idTurno = $idTurno;

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
