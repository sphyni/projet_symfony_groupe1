<?php

namespace App\Controller;

use App\Entity\Etat;
use App\Entity\Site;
use App\Entity\Lieu;
use App\Entity\Ville;
use App\Entity\Sortie;
use App\Form\CreateAccueilType;
use App\Form\CreateEtatType;
use App\Form\CreateLieuType;
use App\Form\CreateSiteType;
use App\Form\CreateSortiesType;
use App\Repository\EtatRepository;
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
       // $site   = new Site;
        //$lieu   = new Lieu;
        //$ville  = new Ville;
        $etat   = new Etat;

        $sortieForm     = $this->createForm(CreateSortiesType::class, $sortie);
        //$siteForm     = $this->createForm(CreateSiteType::class, $site);
        //$lieuForm     = $this->createForm(CreateLieuType::class, $lieu);
        //$villeForm    = $this->createForm(CreateVilleType::class, $ville);
        $etatForm           = $this->createForm(CreateEtatType::class, $etat);

        $sortieForm->handleRequest($request);
        $etatForm->handleRequest($request);
        //$siteForm->handleRequest($request);
        //$lieuForm->handleRequest($request);

        if ($sortieForm->isSubmitted() && $sortieForm->isValid()){
            $sortie->setEtat($etat);
            $sortie->setHistorique(1);

            $entityManager->persist($sortie);
            $entityManager->flush();

            $this->addFlash('succes', 'Sortie publiée');

            return $this->redirectToRoute('accueil');
        }


        return $this->render('sorties/create-sortie.html.twig', [
            'sortieForm'   => $sortieForm->createView(),
            'etatForm'         => $etatForm->createView(),
            //'siteForm'     => $siteForm->createView(),
            //'lieuForm'     => $lieuForm->createView(),
            //'villeForm'    => $villeForm->createView(),
        ]);
    }
    /**
     * @Route("/accueil", name="accueil")
     */
    public function createSearch(Request $request, EntityManagerInterface $entityManager): Response{
        $sortie = new Sortie;

        $searchForm = $this->createForm(CreateAccueilType::class, $sortie);

        $searchForm->handleRequest($request);

        if ($searchForm->isSubmitted() && $searchForm->isValid()){
            $entityManager->persist($searchForm);
            $entityManager->flush();

        }
        return $this->render('sorties/accueil.html.twig',[
            'search_Form' => $searchForm->createView()
        ]);

    }

    /**
     * @Route("/accueil", name="accueil")

    public function accueilSortie(int $site, EntityManagerInterface $entityManager):Response{
       //$repository = $entityManager->getRepository(Sortie::class);
       // $sortie     = $repository->find(1);
        $repository = $entityManager->getRepository(Sortie::class);
        $searchSite =$repository->findBySite($site);

        return $this->render('sorties/accueil.html.twig', [
            //'sortie' => $sortie,
            'searchSite' => $searchSite,
        ]);
    }
     **/
    /**
     * @Route("/modifier/{$id}")
     */

}