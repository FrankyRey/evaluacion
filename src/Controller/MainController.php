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

use App\Form\RespuestaEvaluacionType;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
    	$alumno = $this->getDoctrine()
                ->getRepository(Alumno::class)
                ->findOneBy([
                	'matricula' => '201900001',
                ]);

        $asignacionMaterias = $this->getDoctrine()
        			->getRepository(AsignacionMateria::class)
        			->findBy([
        				'idGrupo' => $alumno->getIdGrupo(),
        			]);

    	/*if($this->getUser()->hasRole('ROLE_USER'))
    	{
        	return $this->redirectToRoute('alumno', [
        	]);
    	}
        else
        {
        	if($this->getUser()->hasRole('ROLE_ADMIN'))
        	{
        		return $this->redirectToRoute('escolar');
        	}
        	else
        	{
        		return $this->redirectToRoute('fos_user_security_login');
        	}
        }*/

        return $this->render('bundles/FOSUserBundle/layout.html.twig', [
        	'alumno' => $alumno,
        	'asignacionMaterias' => $asignacionMaterias,
        ]);
    }

    /**
     * @Route("/{matricula}/{idAsignacionMateria}/{idPregunta}", name="evaluacion")
     */
    public function evaluacion(Request $request, Alumno $alumno, AsignacionMateria $asignacionMateria, Pregunta $pregunta)
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

            return $this->redirectToRoute('evaluacion', [
            	'asignacionMateria' => $asignacionMateria,
            	'pregunta' => $pregunta->getIdPregunta()+1,
            	'alumno' => $alumno
            ]);
        }

    	return $this->render('bundles/FOSUserBundle/evaluacion.html.twig', [
    		'asignacionMateria' => $asignacionMateria,
    		'pregunta' => $pregunta,
    		'form' => $form->createView(),
    	]);
    }
}
