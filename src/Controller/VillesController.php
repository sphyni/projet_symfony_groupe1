<?php

namespace App\Controller;

use App\Entity\Ville;
use App\Form\GestionVilleType;
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

            $this->addFlash('succes', 'ville créée');

            return $this->redirectToRoute('lieu');
        }


        return $this->render('villes/create-ville.html.twig', [
            'villeForm'   => $villeForm->createView(),

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

    /**
     * @Route("/villesdelete/{id}", name="ville_delete", requirements={"id":"\d+"})
     */
    public function delete(int $id){
        $entityManager = $this->getDoctrine()->getManager();
        $ville = $this->getDoctrine()->getRepository(\Proxies\__CG__\App\Entity\Ville::class);
        $ville=$ville->find($id);

        $entityManager->remove($ville);
        $entityManager->flush();

        return $this->redirectToRoute("villes");
    }

    /**
     * @Route("/villeEdit/{id}", name="ville_edit", requirements={"id":"\d+"})
     */
    public function update(Request $request, int $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repository =$entityManager->getRepository(Ville::class);
        $ville = $repository->find($id);

        $villeForm = $this->createForm(GestionVilleType::class, $ville);
        $villeForm->handleRequest($request);
        $allVille = $repository->findAll();

        if ($villeForm->isSubmitted() && $villeForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $ville = $villeForm->getData();
            $em->flush();

            return $this->redirectToRoute("villes");
        }
        $this->addFlash('success', 'ville modifiée');
        return $this->render('villes/list.html.twig', [
            'villes' => $allVille,
            'villeForm' => $villeForm->createView(),
        ]);
    }
}
