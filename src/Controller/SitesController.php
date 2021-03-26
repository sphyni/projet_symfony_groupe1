<?php

namespace App\Controller;

use App\Entity\Site;
use App\Form\GestionSiteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SitesController
 * @package App\Controller
 */
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
        $siteForm->handleRequest($request);

        if ($siteForm->isSubmitted() && $siteForm->isValid()) {
            $entityManager->persist($site);
            $entityManager->flush();

            $this->addFlash('success', 'site ajouté');
            return  $this->redirectToRoute('sites');
        }
        return $this->render('sites/list.html.twig', [
            'sites' => $allSites,
            'controller_name' => 'SitesController',
            'siteForm' => $siteForm->createView(),
        ]);
    }

    /**
     * @Route("/sitesdelete/{id}", name="site_delete", requirements={"id":"\d+"})
     */
    public function delete(int $id){
        $entityManager = $this->getDoctrine()->getManager();
        $site = $entityManager->getRepository(Site::class);

        $site=$site->find($id);

        $entityManager->remove($site);
        $entityManager->flush();

        return $this->redirectToRoute("sites");
    }

    /**
     * @Route("/siteEdit/{id}", name="site_edit", requirements={"id":"\d+"})
     */
    public function update(Request $request, int $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repository =$entityManager->getRepository(Site::class);

        $site = $repository->find($id);

        $siteForm = $this->createForm(GestionSiteType::class, $site);
        $siteForm->handleRequest($request);

        $allSites = $repository->findAll();

        if ($siteForm->isSubmitted() && $siteForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $site = $siteForm->getData();
            $em->flush();

            return $this->redirectToRoute("sites");
        }
        $this->addFlash('success', 'site modifié');
        return $this->render('sites/list.html.twig', [
            'sites' => $allSites,
            'siteForm' => $siteForm->createView(),
        ]);
    }

}
