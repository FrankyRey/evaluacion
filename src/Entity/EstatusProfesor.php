<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstatusProfesor
 *
 * @ORM\Table(name="estatus_profesor")
 * @ORM\Entity
 */
class EstatusProfesor
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_estatus_profesor", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEstatusProfesor;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_estatus_profesor", type="string", length=50, nullable=false)
     */
    private $nombreEstatusProfesor;

    public function getIdEstatusProfesor(): ?int
    {
        return $this->idEstatusProfesor;
    }

    public function getNombreEstatusProfesor(): ?string
    {
        return $this->nombreEstatusProfesor;
    }

    public function setNombreEstatusProfesor(string $nombreEstatusProfesor): self
    {
        $this->nombreEstatusProfesor = $nombreEstatusProfesor;

        return $this;
    }


}
