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
       // $site   = new Site;
       // $lieu   = new Lieu;
       //$ville  = new Ville;

        $sortieForm = $this->createForm(CreateSortiesType::class, $sortie);
        ///$siteForm   = $this->createForm(CreateSiteType::class, $site);
        //$lieuForm   = $this->createForm(CreateLieuType::class, $lieu);
        //$villeForm  = $this->createForm(CreateVilleType::class, $ville);

        $sortieForm->handleRequest($request);
        //$siteForm->handleRequest($request);
        //$lieuForm->handleRequest($request);

        if ($sortieForm->isSubmitted() && $sortieForm->isValid()){
            $sortie->setEtat(2);
            $sortie->setLieu(1);
            $sortie->getSite(6);
            $sortie->getHistorique(1);

            $entityManager->persist($sortie);
            $entityManager->flush();

            return $this->redirectToRoute('sortie');
        }



/**
        if ($villeForm->isSubmitted() && $villeForm->isValid()){
            $entityManager->persist($ville);
            $entityManager->flush();
        }
**/

        return $this->render('sorties/create-sortie.html.twig', [
            'sortieForm'   => $sortieForm->createView(),
            //'siteForm'     => $siteForm->createView(),
            //'lieuForm'     => $lieuForm->createView(),
            //'villeForm'    => $villeForm->createView(),
        ]);
    }
    /**
     * @Route("/accueil", name="accueil")
     */
    public function redirectionAccueil():Response{
        return $this->render('sorties/accueil.html.twig');
    }
}
