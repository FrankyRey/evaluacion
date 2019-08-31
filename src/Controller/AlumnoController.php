<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AlumnoController extends AbstractController
{
    /**
     * @Route("/alumno", name="alumno")
     */
    public function index()
    {
        return $this->render('bundles/FOSUserBundle/layout.html.twig');
    }
}