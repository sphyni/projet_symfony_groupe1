<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class MainController
{
/**
 *@Route("/", name="login")
 */
public function index(): Reponse
{
    return $this->render('users/index.html.twig', [
        'controller_name' => 'UsersController',
    ]);
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