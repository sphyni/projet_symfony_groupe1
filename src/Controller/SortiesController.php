<?php

namespace App\Controller;

use App\Entity\Etat;
use App\Entity\Sortie;
use App\Entity\User;
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


    public function findEtatCreee(EntityManagerInterface $entityManager)
    {
        $repository = $entityManager->getRepository(Etat::class);
        $etatCreee = $repository->findOneBy([
            'libelle' => 'Créée'
        ]);

        return $etatCreee;
    }

    public function findEtatOuvert(EntityManagerInterface $entityManager)
    {
        $repository = $entityManager->getRepository(Etat::class);
        $etatOuvert = $repository->findOneBy([
            'libelle' => 'Ouvert'
        ]);
        return $etatOuvert;
    }

    /**
     * @Route("/sorties", name="sorties")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function createSortie(Request $request, EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(User::class);
        $siteOrganisateur = $repository->findOneBy(['username' => $this->getUser()->getUsername()]);
        $siteId = $siteOrganisateur->getSite();

        $sortie = new Sortie;

        $sortieForm = $this->createForm(CreateSortiesType::class, $sortie);

        $sortieForm->handleRequest($request);


        if ($sortieForm->isSubmitted() && $sortieForm->isValid() && $sortieForm->get('save')->isClicked()) {

            $etat = $this->findEtatCreee($entityManager);

            $sortie->setHistorique(1);
            $sortie->setSite($siteId);
            $sortie->setParticipants($siteOrganisateur);
            $sortie->setEtat($etat);

            $entityManager->persist($sortie);
            $entityManager->flush();

            $this->addFlash('succes', 'Sortie publiée');

            return $this->redirectToRoute('accueil');

        } elseif ($sortieForm->isSubmitted() && $sortieForm->isValid() && $sortieForm->get('add')->isClicked()) {

            $etat = $this->findEtatOuvert($entityManager);

            $sortie->setHistorique(1);
            $sortie->setSite($siteId);
            $sortie->setParticipants($siteOrganisateur);
            $sortie->setEtat($etat);

            $entityManager->persist($sortie);
            $entityManager->flush();

            $this->addFlash('succes', 'Sortie publiée');

            return $this->redirectToRoute('accueil');
        }


        return $this->render('sorties/create-sortie.html.twig', [
            'sortieForm' => $sortieForm->createView(),

        ]);
    }

}