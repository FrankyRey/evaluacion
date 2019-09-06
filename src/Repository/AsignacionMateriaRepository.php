<?php
namespace App\Repository;

use App\Entity\AsignacionMateria;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\Expr;

class AsignacionMateriaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AsignacionMateria::class);
    }

    /**
     * @param $matricula
     * @return AsignacionMateria[]
     */
    public function encuentraFaltantes($matricula): array
    {
        // automatically knows to select Products
        // the "p" is an alias you'll use in the rest of the query
        $qb = $this->createQueryBuilder('u');
        
        $qb
            ->select('u')
            ->leftJoin('App\Entity\Comentario', 'c', 'ON' ,'u.idAsignanacionMateria = c.idAsignanacionMateria') 
            ->where('u.alumnoMatricula = :matricula')
            ->setParameter('matricula', $matricula)
        ;
            
        return $qb->getQuery()->getResult();

        // to get just one result:
        // $product = $qb->setMaxResults(1)->getOneOrNullResult();
    }
}