<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Profesor;
use App\Entity\AsignacionMateria;
use App\Entity\Curricula;
use App\Entity\Comentario;
use App\Entity\RespuestaEvaluacion;

use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/escolar")
 */
class EscolarController extends AbstractController
{
    /**
     * @Route("/", name="escolar")
     */
    public function index(Request $request, PaginatorInterface $paginator)
    {
    	// Retrieve the entity manager of Doctrine
        $em = $this->getDoctrine()->getManager();
        
        // Get some repository of data, in our case we have an Appointments entity
        $profesorRepository = $em->getRepository(Profesor::class);
                
        // Find all the data on the Appointments table, filter your query as you need
        $allProfesoresQuery = $profesorRepository->createQueryBuilder('p')
        	->orderBy('p.nombreCompleto', 'ASC')
            ->getQuery();
        
        // Paginate the results of the query
        $profesores = $paginator->paginate(
            // Doctrine Query, not results
            $allProfesoresQuery,
            // Define the page parameter
            $request->query->getInt('page', 1),
            // Items per page
            10
        );

    	return $this->render('escolar/index.html.twig', [
    		'profesores' => $profesores
    	]);
    }

    /**
     * @Route("/profesor/{matricula}", name="detalle_profesor", methods={"GET"})
     */
    public function detalleProfesor(Request $request, Profesor $profesor)
    {
    	$em = $this->getDoctrine()->getManager();
        
        // Get some repository of data, in our case we have an Appointments entity
        $materiasRepository = $em->getRepository(AsignacionMateria::class);
        $curriculaRepository = $em->getRepository(Curricula::class);

    	$materiasQuery = $materiasRepository->createQueryBuilder('m')
            ->select('IDENTITY(m.idCurricula)')
            ->Where('m.profesorMatricula = :matricula')
            ->setParameter('matricula', $profesor->getMatricula())
            ->groupby('m.idCurricula')
            ->getQuery();

        $materiasA = $materiasQuery->getResult();

        foreach ($materiasA as $materia) {
            $materias[] = $curriculaRepository->findBy([
                'idCurricula' => $materia[1]
            ]);
        }

    	return $this->render('escolar/detalle.html.twig', [
    		'profesor' => $profesor,
    		'materias' => $materias
    	]);
    }

    /**
     * @Route("/profesor/{matricula}/{idCurricula}", name="detalle_materia", methods={"GET"})
     */
    public function detalleMateria(Request $request, Profesor $profesor, Curricula $curricula)
    {
        $em = $this->getDoctrine()->getManager();
        
        // Get some repository of data, in our case we have an Appointments entity
        $materiasRepository = $em->getRepository(AsignacionMateria::class);
        $comentarioRepository = $em->getRepository(Comentario::class);
        $respuestasRepository = $em->getRepository(RespuestaEvaluacion::class);

        $materiasQuery = $materiasRepository->createQueryBuilder('m')
            ->select('m.idAsignacionMateria')
            ->Where('m.profesorMatricula = :matricula')
            ->andWhere('m.idCurricula = :idCurricula')
            ->setParameter('matricula', $profesor->getMatricula())
            ->setParameter('idCurricula', $curricula->getIdCurricula())
            ->getQuery();

        $materiasA = $materiasQuery->getResult();

        foreach ($materiasA as $materia) {
            $comentarios[] = $comentarioRepository->findBy([
                'idAsignacionMateria' => $materia['idAsignacionMateria']
            ]);

            $respuestas[] = $respuestasRepository->findBy([
                'idAsignacionMateria' => $materia['idAsignacionMateria']
            ]);

            $alumnos[] = [
                'comentario' => $comentarioRepository->findBy([
                    'idAsignacionMateria' => $materia['idAsignacionMateria']
                    ]),
                'respuestas' => $respuestasRepository->findBy([
                    'idAsignacionMateria' => $materia['idAsignacionMateria']
                    ])
            ];
        }

        return $this->render('escolar/comentarios.html.twig', [
            'profesor' => $profesor,
            'comentarios' => $comentarios,
            'respuestas' => $respuestas,
            'alumnos' => $alumnos
        ]);
    }
}