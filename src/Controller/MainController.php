<?php


namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class MainController
{


/**
 *@Route("/", name="app_login")
 */
public function login(): Reponse
{
    return $this->render('security/login.html.twig', [
        'controller_name' => 'SecurityController',
    ]);
}

}