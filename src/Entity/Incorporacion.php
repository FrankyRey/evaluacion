<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Incorporacion
 *
 * @ORM\Table(name="incorporacion")
 * @ORM\Entity
 */
class Incorporacion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_incorporacion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idIncorporacion;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_incorporacion", type="string", length=100, nullable=false)
     */
    private $nombreIncorporacion;

    public function getIdIncorporacion(): ?int
    {
        return $this->idIncorporacion;
    }

    public function getNombreIncorporacion(): ?string
    {
        return $this->nombreIncorporacion;
    }

    public function setNombreIncorporacion(string $nombreIncorporacion): self
    {
        $this->nombreIncorporacion = $nombreIncorporacion;

        return $this;
    }


}
