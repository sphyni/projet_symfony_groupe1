<?php

namespace App\Controller;

use App\Entity\Participant;
use App\Form\MonProfileType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UsersController extends AbstractController
{


    #[Route('/users', name: 'user_list')]
    public function list(EntityManagerInterface $entityManager): Response
    {


        $repository = $entityManager->getRepository(Participant::class);
        $users = $repository->findParticipantsBy();


        return $this->render('users/list.html.twig', [
            'ideas' => $users
        ]);
    }

    /**
     * @Route("/profile/{id}", name="profile", requirements={"id":"\d+"})
     */
    public function details(int $id, EntityManagerInterface $em):response
    {

        $repository=$em->getRepository(Participant::class);
        $user =$repository->find($id);

        return $this->render('');

    }

    /**
     * @Route("/monprofile", name="monProfile")
     */
    public function create(Request $request, EntityManagerInterface $em):response
    {
        $user = new Participant;
        $monProfilForm = $this->createForm(MonProfileType::class, $user);

        $monProfilForm->handleRequest($request);

        if ($monProfilForm->isSubmitted() && $monProfilForm->isValid()) {

            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'profile modifié');
            return $this->redirectToRoute('#');
        }
    }

     /**
      * @Route("/", name="login")
     */
    public function login(AuthenticationUtils $authUtils)
    {
        $error = $authUtils->getLastAuthenticationError();
        $lastUsername = $authUtils->getLastUsername();

        return $this->render('users/index.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }

}
