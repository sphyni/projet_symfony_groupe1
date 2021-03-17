<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SitesController extends AbstractController
{
    /**
     * @Route("/sites", name="sites")
     */
    public function index(): Response
    {
        return $this->render('sites/create-sortie.html.twig', [
            'controller_name' => 'SitesController',
        ]);
    }
}
