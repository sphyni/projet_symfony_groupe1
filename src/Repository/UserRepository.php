<?php


namespace App\Repository;


use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserRepository
{
    /**
     * @Route("/login", name="login")
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