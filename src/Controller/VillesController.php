<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class VillesController
 * @package App\Controller
 */
class VillesController extends AbstractController
{
    /**
     * @Route("/villes", name="villes")
     */
    public function index(): Response
    {
        return $this->render('villes/create-sortie.html.twig', [
            'controller_name' => 'VillesController',
        ]);
    }
}
