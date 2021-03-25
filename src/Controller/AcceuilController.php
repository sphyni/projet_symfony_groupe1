<?php

namespace App\Controller;

use App\DataSearch\SearchData;
use App\Entity\Sortie;
use App\Form\SearchForm;
use App\Repository\SortieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(SortieRepository $repository,EntityManagerInterface $em, Request $request): Response
    {
        $data = new SearchData();
        $UserInSession= $this->getUser();
        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);

        $sorties = $repository->findSearch($data, $UserInSession);
        return $this->render('acceuil/index.html.twig',[
            'sorties' =>$sorties,
            'form' => $form->createView()
                    ] );
    }


    /**
     * @Route("/sortie/{id}", name="details", requirements={"id":"\d+"})
     */
    public function details(int $id, EntityManagerInterface $em):response
    {

        $repository=$em->getRepository(Sortie::class);

        $sortie = $repository->find($id);

        return $this->render('sorties/details.html.twig',[
            'sortie' => $sortie
        ]);

    }

}