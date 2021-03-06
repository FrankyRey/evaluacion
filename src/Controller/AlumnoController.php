<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Alumno;
use App\Entity\AsignacionMateria;
use App\Entity\Pregunta;
use App\Entity\OpcionPregunta;
use App\Entity\RespuestaEvaluacion;
use App\Entity\Comentario;

use App\Form\RespuestaEvaluacionType;
use App\Form\ComentarioType;

/**
 * @Route("/alumno")
 */
class AlumnoController extends AbstractController
{
    /**
     * @Route("/", name="alumno")
     */
    public function index()
    {
        $alumno = $this->getDoctrine()
                ->getRepository(Alumno::class)
                ->findOneBy([
                	'matricula' => $this->getUser()->getUsername(),
                ]);

    	$qb = $this->getDoctrine()->getManager()->createQueryBuilder();
    	
    	$qb
        	->select('a')
        	->from(AsignacionMateria::class, 'a')
        	->leftJoin(Comentario::class, 'c', 'WITH', 'c.idAsignacionMateria = a AND c.alumnoMatricula = a.alumnoMatricula')
        	->andWhere('c.idAsignacionMateria IS NULL')
        	->andwhere('a.alumnoMatricula = :matricula')
            ->setParameter('matricula', $this->getUser()->getUsername())
        ;

        $faltantes = $qb->getQuery()->getResult();

        return $this->render('bundles/FOSUserBundle/layout.html.twig', [
        	'alumno' => $alumno,
        	'asignacionMaterias' => $faltantes,
        ]);
    }

    /**
     * @Route("/", name="profile")
     */
    public function profile()
    {
        return $this->render('bundles/FOSUserBundle/layout.html.twig');
    }


    /**
     * @Route("/{matricula}/{idAsignacionMateria}/comentario", name="comentario")
     */
    public function comentario(Request $request, Alumno $alumno, AsignacionMateria $asignacionMateria)
    {
        $user = $this->getUser();

        if($alumno->getMatricula() != $user->getUsername())
            return $this->redirectToRoute('home');

        $comentario = new Comentario();
        $comentario->setIdAsignacionMateria($asignacionMateria);
        $comentario->setAlumnoMatricula($alumno);
        $form = $this->createForm(ComentarioType::class, $comentario);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comentario);
            $entityManager->flush();
           	
           	return $this->redirectToRoute('home');
        }

    	return $this->render('bundles/FOSUserBundle/comentario.html.twig', [
    		'asignacionMateria' => $asignacionMateria,
    		'form' => $form->createView(),
    	]);
    }

    /**
     * @Route("/{matricula}/{idAsignacionMateria}/{idPregunta}", name="evaluacion")
     */
    public function evaluacion(Request $request, Alumno $alumno, AsignacionMateria $asignacionMateria, Pregunta $pregunta)
    {
        $user = $this->getUser();

        if($alumno->getMatricula() != $user->getUsername())
            return $this->redirectToRoute('home');
        
    	$conn = $this->getDoctrine()->getManager()->getConnection();

        $sqlUltimaPregunta = '
            SELECT 
                MAX(id_pregunta) as ultimaPregunta
            FROM
                pregunta
            WHERE
                id_evaluacion = 1;
        ';

        $stmt = $conn->prepare($sqlUltimaPregunta);
        $stmt->execute();

        $ultimaPregunta = (int)$stmt->fetch()['ultimaPregunta'];

        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();
        
        $qb
            ->select('p')
            ->from(Pregunta::class, 'p')
            ->leftJoin(OpcionPregunta::class, 'o', 'WITH', 'o.idPregunta = p')
            ->leftJoin(RespuestaEvaluacion::class, 'r', 'WITH', 'r.idOpcionPregunta = o AND o.idPregunta = p')
            ->andWhere('r.idAsignacionMateria = :idAsignacionMateria')
            ->andWhere('r.alumnoMatricula = :matricula')
            ->andWhere('p.idPregunta = :idPregunta')
            ->setParameter('idAsignacionMateria', $asignacionMateria->getIdAsignacionMateria())
            ->setParameter('matricula', $alumno->getMatricula())
            ->setParameter('idPregunta', $pregunta->getIdPregunta())
            ->distinct(true)
        ;

        $preguntaRespondida = $qb->getQuery()->getResult();

        if(!$preguntaRespondida)
        {
            $respuestaEvaluacion = new RespuestaEvaluacion();
            $respuestaEvaluacion->setIdAsignacionMateria($asignacionMateria);
            $respuestaEvaluacion->setAlumnoMatricula($alumno);
            $form = $this->createForm(RespuestaEvaluacionType::class, $respuestaEvaluacion, [
        	   'idPregunta' => $pregunta->getIdPregunta(),
            ]);

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($respuestaEvaluacion);
                $entityManager->flush();

                $preguntaSiguiente = $pregunta->getIdPregunta()+1;

                if($preguntaSiguiente <= $ultimaPregunta)
            	   return $this->redirectToRoute('evaluacion', [
            		  'idAsignacionMateria' => $asignacionMateria->getIdAsignacionMateria(),
            		  'idPregunta' => $preguntaSiguiente,
            		  'matricula' => $alumno->getMatricula()
            	   ]);
           	    else
           		   return $this->redirectToRoute('comentario', [
           			  'idAsignacionMateria' => $asignacionMateria->getIdAsignacionMateria(),
           			  'matricula' => $alumno->getMatricula()
           		   ]);
            }

    	   return $this->render('bundles/FOSUserBundle/evaluacion.html.twig', [
    		  'asignacionMateria' => $asignacionMateria,
    		  'pregunta' => $pregunta,
    		  'form' => $form->createView(),
    	   ]);
        }
        else
        {
            $preguntaSiguiente = $pregunta->getIdPregunta()+1;

            if($preguntaSiguiente <= $ultimaPregunta)
               return $this->redirectToRoute('evaluacion', [
                  'idAsignacionMateria' => $asignacionMateria->getIdAsignacionMateria(),
                  'idPregunta' => $preguntaSiguiente,
                    'matricula' => $alumno->getMatricula()
                ]);
            else
               return $this->redirectToRoute('comentario', [
                  'idAsignacionMateria' => $asignacionMateria->getIdAsignacionMateria(),
                  'matricula' => $alumno->getMatricula()
                ]);
        }
    }
}