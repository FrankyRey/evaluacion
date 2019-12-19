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

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
    	$user = $this->getUser();

    	if($user)
    	{
    		if($this->getUser()->hasRole('ROLE_ADMIN'))
    		{
        		return $this->redirectToRoute('escolar');
    		}
        	else
        	{
        		if($this->getUser()->hasRole('ROLE_USER'))
                {
        		  return $this->redirectToRoute('alumno');
                }
                else
                {
                    return $this->redirect('/login');
                }
        	}
        }
        else
        {
        	return $this->redirect('/login');
        }
    }
}
