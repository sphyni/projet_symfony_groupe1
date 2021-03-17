<?php


namespace App\Repository;

use App\Entity\Particpant;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserRepository
{
    /**
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $authUtils)
    {
        $error = $authUtils->getLastAuthenticationError();
        $pseudo = $authUtils->getPseudo();

        return $this->render('users/index.html.twig', array(
            'pseudo' => $pseudo,
            'error'         => $error,
        ));
    }

}