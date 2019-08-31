<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EscolarController extends AbstractController
{
    /**
     * @Route("/escolar", name="escolar")
     */
    public function index()
    {
    	return $this->render('bundles/FOSUserBundle/layout.html.twig');
    }
}