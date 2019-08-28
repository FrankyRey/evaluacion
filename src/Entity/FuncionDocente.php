<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FuncionDocente
 *
 * @ORM\Table(name="funcion_docente")
 * @ORM\Entity
 */
class FuncionDocente
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_funcion_docente", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFuncionDocente;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_funcion_docente", type="string", length=150, nullable=false)
     */
    private $nombreFuncionDocente;

    public function getIdFuncionDocente(): ?int
    {
        return $this->idFuncionDocente;
    }

    public function getNombreFuncionDocente(): ?string
    {
        return $this->nombreFuncionDocente;
    }

    public function setNombreFuncionDocente(string $nombreFuncionDocente): self
    {
        $this->nombreFuncionDocente = $nombreFuncionDocente;

        return $this;
    }


}
