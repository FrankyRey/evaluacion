<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Materia
 *
 * @ORM\Table(name="materia")
 * @ORM\Entity
 */
class Materia
{
    /**
     * @var string
     *
     * @ORM\Column(name="id_materia", type="string", length=15, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMateria;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_materia", type="string", length=150, nullable=false)
     */
    private $nombreMateria;

    public function getIdMateria(): ?string
    {
        return $this->idMateria;
    }

    public function getNombreMateria(): ?string
    {
        return $this->nombreMateria;
    }

    public function setNombreMateria(string $nombreMateria): self
    {
        $this->nombreMateria = $nombreMateria;

        return $this;
    }


}
