<?php

namespace App\Controller;

use App\Entity\Ville;
use App\Form\CreateVilleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    public function createVille(Request $request,EntityManagerInterface $entityManager): Response
    {
        $ville = new Ville;
        $villeForm     = $this->createForm(CreateVilleType::class, $ville);

        $villeForm->handleRequest($request);


        if ($villeForm->isSubmitted() && $villeForm->isValid()){


            $entityManager->persist($ville);
            $entityManager->flush();

            $this->addFlash('succes', 'Sortie publiée');

            return $this->redirectToRoute('lieu');
        }


        return $this->render('villes/create-ville.html.twig', [
            'villeForm'   => $villeForm->createView(),

        ]);
    }
}
