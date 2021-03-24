<?php

namespace App\Controller;


use App\Data\SearchData;
use App\Entity\Sortie;
use App\Form\CreateAccueilType;
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


    /**
     * @Route("/accueil", name="accueil")

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

    } */

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

}