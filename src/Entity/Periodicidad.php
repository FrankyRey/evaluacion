<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Periodicidad
 *
 * @ORM\Table(name="periodicidad")
 * @ORM\Entity
 */
class Periodicidad
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_periodicidad", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPeriodicidad;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_periodicidad", type="string", length=100, nullable=false)
     */
    private $nombrePeriodicidad;

    /**
     * @var string|null
     *
     * @ORM\Column(name="abreviatura", type="string", length=50, nullable=true)
     */
    private $abreviatura;

    public function getIdPeriodicidad(): ?int
    {
        return $this->idPeriodicidad;
    }

    public function getNombrePeriodicidad(): ?string
    {
        return $this->nombrePeriodicidad;
    }

    public function setNombrePeriodicidad(string $nombrePeriodicidad): self
    {
        $this->nombrePeriodicidad = $nombrePeriodicidad;

        return $this;
    }

    public function getAbreviatura(): ?string
    {
        return $this->abreviatura;
    }

    public function setAbreviatura(?string $abreviatura): self
    {
        $this->abreviatura = $abreviatura;

        return $this;
    }


}
