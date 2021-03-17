<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UsersController extends AbstractController
{
    /**
     * @Route("/users", name="users")
     */
    public function index(): Response
    {
        return $this->render('users/index.html.twig', [
            'controller_name' => 'UsersController',
        ]);
    }

    /**
     * @Route("/", name="login")
     */

    public function login(AuthenticationUtils $utils): Response
    {
        return $this->render('users/index.html.twig', [
            'loginError'      => $utils->getLastAuthenticationError(),
            'loginUsername'   => $utils->getLastUsername(),
        ]);
    }

}
