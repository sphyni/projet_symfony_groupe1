<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Entity\Sortie;
use App\Entity\Etat;
use App\Form\AnnulerType;
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
        $data = new Sortie();
        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);

        $sorties = $repository->findSearch($data);
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

    public function findEtatAnnule(EntityManagerInterface $entityManager)
    {
        $repository = $entityManager->getRepository(Etat::class);
        $etatAnnulee = $repository->findOneBy([
            'libelle' => 'Annulee'
        ]);

        return $etatAnnulee;
    }

    /**
     * @Route("/sortie/{id}", name="annuler", requirements={"id":"\d+"})
     */
    public function annuler(int $id, EntityManagerInterface $entityManager, Request $request):response
    {
        //Affichage d'information sur la sortie
        $repository     = $entityManager->getRepository(Sortie::class);
        $sortie         = $repository->find($id);
        //Formulaire
        $annulerForm    = $this->createForm(AnnulerType::class, $sortie);
        $annulerForm->handleRequest($request);

       // $data= $annulerForm->getData();
        /**
        $entityManager = $this->getDoctrine()->getManager();
        $sortie = $entityManager->getRepository(Sortie::class)->find($id);
        $annulerForm = $this->createForm(AnnulerType::class, $sortie);
        $annulerForm->handleRequest($sortie);
        **/

        if ($annulerForm->isSubmitted() && $annulerForm->isValid()){
            $etat =$this->findEtatAnnule($entityManager);
            $sortie->setEtat($etat);

            $entityManager->persist($sortie);
            $entityManager->flush();

            return $this->redirectToRoute('accueil');
        }

        return $this->render('sorties/annuler.html.twig', [
            'sortie' => $sortie,
            'sortieForm' => $annulerForm->createView(),
        ]);
    }


}