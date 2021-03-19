<?php

namespace App\Controller;

use App\Entity\Site;
use App\Form\GestionSiteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SitesController extends AbstractController
{
    /**
     * @Route("/sites", name="sites")
     */
    public function listAnCreate(Request $request, EntityManagerInterface $em, EntityManagerInterface $entityManager): response
    {


        $repository = $em->getRepository(Site::class);
        $allSites = $repository->findAll();

        $site = new Site;
        $siteForm = $this->createForm(GestionSiteType::class, $site);
//dd($site);

        $siteForm->handleRequest($request);
//dd($site);
        if ($siteForm->isSubmitted() && $siteForm->isValid()) {
            $entityManager->persist($site);
            $entityManager->flush();

            $this->addFlash('success', 'site ajouté');
            return  $this->redirectToRoute('sites');
        }
//dd($site);
        return $this->render('sites/list.html.twig', [
            'sites' => $allSites,
            'controller_name' => 'SitesController',
            'siteForm' => $siteForm->createView(),
        ]);
    }

}
