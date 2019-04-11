<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController {



    /**
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $authenticationUtils) 
    {   
        // Récupère les erreurs et username
        // dans le login.html.twig le message d'erreur est affiché
        // messageKey ou message d'erreur traduit
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }

    /**
     * @Route("/login1", name="login1")
     */
    public function login1(AuthenticationUtils $authenticationUtils) 
    {   
        // Récupère les erreurs et username
        // dans le login.html.twig le message d'erreur est affiché
        // messageKey ou message d'erreur traduit
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('security/login1.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }


}