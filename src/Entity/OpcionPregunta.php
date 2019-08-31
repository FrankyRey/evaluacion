<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OpcionPregunta
 *
 * @ORM\Table(name="opcion_pregunta", indexes={@ORM\Index(name="fk_opcion_pregunta_pregunta1_idx", columns={"id_pregunta"})})
 * @ORM\Entity
 */
class OpcionPregunta
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_opcion_pregunta", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOpcionPregunta;

    /**
     * @var string
     *
     * @ORM\Column(name="texto_opcion_pregunta", type="string", length=150, nullable=false)
     */
    private $textoOpcionPregunta;

    /**
     * @var int
     *
     * @ORM\Column(name="puntaje", type="integer", nullable=false)
     */
    private $puntaje;

    /**
     * @var \Pregunta
     *
     * @ORM\ManyToOne(targetEntity="Pregunta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pregunta", referencedColumnName="id_pregunta")
     * })
     */
    private $idPregunta;

    public function getIdOpcionPregunta(): ?int
    {
        return $this->idOpcionPregunta;
    }

    public function getTextoOpcionPregunta(): ?string
    {
        return $this->textoOpcionPregunta;
    }

    public function setTextoOpcionPregunta(string $textoOpcionPregunta): self
    {
        $this->textoOpcionPregunta = $textoOpcionPregunta;

        return $this;
    }

    public function getPuntaje(): ?int
    {
        return $this->puntaje;
    }

    public function setPuntaje(int $puntaje): self
    {
        $this->puntaje = $puntaje;

        return $this;
    }

    public function getIdPregunta(): ?Pregunta
    {
        return $this->idPregunta;
    }

    public function setIdPregunta(?Pregunta $idPregunta): self
    {
        $this->idPregunta = $idPregunta;

        return $this;
    }


}
