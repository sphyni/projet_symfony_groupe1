<?php

namespace App\Controller;

use App\Entity\Lieu;
use App\Form\CreateLieuType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LieuController extends AbstractController
{
    /**
     * @Route("/lieu", name="lieu")
     */
    public function createLieu(Request $request,EntityManagerInterface $entityManager): Response
    {
        $lieu = new Lieu;
        $lieuForm     = $this->createForm(CreateLieuType::class, $lieu);

        $lieuForm->handleRequest($request);


        if ($lieuForm->isSubmitted() && $lieuForm->isValid()){


            $entityManager->persist($lieu);
            $entityManager->flush();

            $this->addFlash('succes', 'Sortie publiée');

            return $this->redirectToRoute('sorties');
        }


        return $this->render('lieu/create-lieu.html.twig', [
            'lieuForm'   => $lieuForm->createView(),

        ]);
    }
}
