<?php

namespace App\Controller;

use App\Entity\Site;
use App\Entity\Ville;
use App\Form\GestionVilleType;
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
    public function index(): Response
    {
        return $this->render('villes/create-lieu.html.twig', [
            'controller_name' => 'VillesController',
        ]);
    }

    /**
     * @Route("/villes", name="villes")
     */
    public function listAnCreate(Request $request, EntityManagerInterface $em, EntityManagerInterface $entityManager): response
    {


        $repository = $em->getRepository(Ville::class);
        $allVilles = $repository->findAll();

        $ville = new Ville;
        $villeForm = $this->createForm(GestionVilleType::class, $ville);
//dd($site);

        $villeForm->handleRequest($request);
//dd($site);
        if ($villeForm->isSubmitted() && $villeForm->isValid()) {
            $entityManager->persist($ville);
            $entityManager->flush();

            $this->addFlash('success', 'ville ajouté');
            return  $this->redirectToRoute('villes');
        }
//dd($site);
        return $this->render('villes/list.html.twig', [
            'villes' => $allVilles,
            'controller_name' => 'VillesController',
            'villeForm' => $villeForm->createView(),
        ]);
    }
}
