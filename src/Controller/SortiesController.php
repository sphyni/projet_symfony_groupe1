<?php

namespace App\Controller;

use App\Entity\Site;
use App\Entity\Lieu;
use App\Entity\Ville;
use App\Entity\Sortie;
use App\Form\CreateLieuType;
use App\Form\CreateSiteType;
use App\Form\CreateSortiesType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SortiesController extends AbstractController
{
    /**
     * @Route("/sorties", name="sorties")
     */
    public function createSortie(Request $request,EntityManagerInterface $entityManager): Response
    {
        $sortie = new Sortie;
        $site = new Site;
        $lieu = new Lieu;
        //$ville = new Ville;

        $sortieForm = $this->createForm(CreateSortiesType::class, $sortie);
        $siteForm = $this->createForm(CreateSiteType::class, $site);
        $lieuForm = $this->createForm(CreateLieuType::class, $lieu);
       // $villeForm = $this->createForm(CreateVilleType::class, $ville);

        $sortieForm->handleRequest($request);
        //$lieuForm->handleRequest($lieu);
       // $villeForm->handleRequest($ville);

        if ($sortieForm->isSubmitted() && $sortieForm->isValid()){

            $entityManager->persist($sortie);
            $entityManager->flush();

            //return $this->redirectToRoute('#');
        }

        if ($siteForm->isSubmitted() && $siteForm->isValid()){
            $entityManager->persist($site);
            $entityManager->flush();
        }

        if ($lieuForm->isSubmitted() && $lieuForm->isValid()){
            $entityManager->persist($lieu);
            $entityManager->flush();
        }
        /**
        if ($villeForm->isSubmitted() && $villeForm->isValid()){
            $entityManager->persist($ville);
            $entityManager->flush();
        }
         **/

        return $this->render('sorties/create-sortie.html.twig', [
            'sortieForm' => $sortieForm->createView(),
            'siteForm' => $siteForm->createView(),
            'lieuForm'=> $lieuForm->createView(),
            //'villeForm' => $villeForm->createView(),
        ]);
    }
}
