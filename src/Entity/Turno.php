<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Turno
 *
 * @ORM\Table(name="turno")
 * @ORM\Entity
 */
class Turno
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_turno", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTurno;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_turno", type="string", length=50, nullable=false)
     */
    private $nombreTurno;

    public function getIdTurno(): ?int
    {
        return $this->idTurno;
    }

    public function getNombreTurno(): ?string
    {
        return $this->nombreTurno;
    }

    public function setNombreTurno(string $nombreTurno): self
    {
        $this->nombreTurno = $nombreTurno;

        return $this;
    }


}
