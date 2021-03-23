<?php

namespace App\Controller;

use App\Entity\Participant;
use App\Entity\User;
use App\Form\ModificationUserType;
use App\Form\MonProfileType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class ParticipantController
 * @package App\Controller
 */
class ParticipantController extends AbstractController
{


    /**
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    #[Route('/users', name: 'user_list')]
    public function list(EntityManagerInterface $entityManager): Response
    {


        $repository = $entityManager->getRepository(Participant::class);
        $users = $repository->findAll();
//dd($users);

        return $this->render('users/list.html.twig', [
            'users' => $users
        ]);
    }

    /**
     * @Route("/profile/{id}", name="profile", requirements={"id":"\d+"})
     */
    public function details(int $id, EntityManagerInterface $em):response
    {
//dd($id);
        $repository=$em->getRepository(Participant::class);
        //dd($repository);
        $user = $repository->find($id);
//dd($user);
        return $this->render('users/detail.html.twig',[
            'user' => $user
        ]);

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
            return $this->redirectToRoute('users');
        }
    }
    /**
     * @Route("/profile/modify/{id}", name="modify", requirements={"id":"\d+"})
     */
    public function profileEdit(int $id, UserPasswordEncoderInterface $passwordEncoder, Request $request) : Response
    {
        $entityManager =$this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(Participant::class)->find($id);
        $modificationForm = $this->createForm(ModificationUserType::class, $user);
        $modificationForm->handleRequest($request);
        $data=$modificationForm->getData();

        //dd($modificationForm);


        if ($modificationForm->isSubmitted() && $modificationForm->isValid()) {


           $data->setPassword($passwordEncoder->encodePassword($user, $modificationForm->get('password')->getData()));
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'profile modifié');
            return $this->redirectToRoute('user_list',[
                'user' => $user,
            ]);
        }


        return $this->render('users/modification.html.twig',[
            'user' => $user,
            'modificationForm'=>$modificationForm->createView()
        ]);


    }

        /**
         * @Route("/", name="app_login")
         */

        public function login(AuthenticationUtils $utils): Response
    {
        return $this->render('security/login.html.twig', [
            'loginError'      => $utils->getLastAuthenticationError(),
            'loginUsername'   => $utils->getLastUsername(),
        ]);
    }




}
