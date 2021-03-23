<?php

namespace App\Controller;

use App\Entity\Sortie;
use App\Repository\SortieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AcceuilController extends AbstractController
{
    /**
     * @Route("/accueil", name="accueil")
     * @param SortieRepository $repository
     * @return Response
     */
    public function index(EntityManagerInterface $em): Response
    {
        $repository = $em->getRepository(Sortie::class);
        $sorties = $repository->findAll();
        return $this->render('acceuil/index.html.twig',[
            'sorties' =>$sorties,
                    ] );
}
}