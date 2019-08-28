<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OfertaAcademica
 *
 * @ORM\Table(name="oferta_academica", indexes={@ORM\Index(name="fk_oferta_academica_incorporacion_idx", columns={"id_incorporacion"}), @ORM\Index(name="fk_oferta_academica_nivel_academico1_idx", columns={"id_nivel_academico"})})
 * @ORM\Entity
 */
class OfertaAcademica
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_oferta_academica", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOfertaAcademica;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_oferta_academica", type="string", length=100, nullable=false)
     */
    private $nombreOfertaAcademica;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rvoe", type="string", length=100, nullable=true)
     */
    private $rvoe;

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
     * @var \NivelAcademico
     *
     * @ORM\ManyToOne(targetEntity="NivelAcademico")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_nivel_academico", referencedColumnName="id_nivel_academico")
     * })
     */
    private $idNivelAcademico;

    public function getIdOfertaAcademica(): ?int
    {
        return $this->idOfertaAcademica;
    }

    public function getNombreOfertaAcademica(): ?string
    {
        return $this->nombreOfertaAcademica;
    }

    public function setNombreOfertaAcademica(string $nombreOfertaAcademica): self
    {
        $this->nombreOfertaAcademica = $nombreOfertaAcademica;

        return $this;
    }

    public function getRvoe(): ?string
    {
        return $this->rvoe;
    }

    public function setRvoe(?string $rvoe): self
    {
        $this->rvoe = $rvoe;

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

    public function getIdNivelAcademico(): ?NivelAcademico
    {
        return $this->idNivelAcademico;
    }

    public function setIdNivelAcademico(?NivelAcademico $idNivelAcademico): self
    {
        $this->idNivelAcademico = $idNivelAcademico;

        return $this;
    }


}
