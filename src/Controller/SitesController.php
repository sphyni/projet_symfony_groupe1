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
    public function listAndCreate(Request $request, EntityManagerInterface $em): Response
    {
        $repository = $em->getRepository(Site::class);
        $allSites = $repository->findAll();


        $site = new Site;
        $SiteForm = $this->createForm(GestionSiteType::class, $site);

        $SiteForm->handleRequest($request);

        if ($SiteForm->isSubmitted() && $SiteForm->isValid()) {
            $em->persist($site);
            $em->flush();

            $this->addFlash('success', 'site ajouté');
            return  $this->redirectToRoute('sites');
        }

        return $this->render('sites/list.html.twig', [
            'sites' => $allSites,
            'controller_name' => 'SitesController',
        ]);
    }

}
