<?php

namespace App\Controller;


use App\Entity\Sortie;
use App\Form\CreateSortiesType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SortiesController
 * @package App\Controller
 */
class SortiesController extends AbstractController
{
    /**
     * @Route("/sorties", name="sorties")
     */
    public function createSortie(Request $request,EntityManagerInterface $entityManager): Response
    {
        $sortie = new Sortie;
        $sortieForm     = $this->createForm(CreateSortiesType::class, $sortie);

        $sortieForm->handleRequest($request);


        if ($sortieForm->isSubmitted() && $sortieForm->isValid()){
            $sortie->setHistorique(1);

            $entityManager->persist($sortie);
            $entityManager->flush();

            $this->addFlash('succes', 'Sortie publiée');

            return $this->redirectToRoute('sorties');
        }


        return $this->render('sorties/create-sortie.html.twig', [
            'sortieForm'   => $sortieForm->createView(),

        ]);
    }
}