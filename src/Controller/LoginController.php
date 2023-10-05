<?php

namespace App\Controller;

//ici j'importe mes bundles et component
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//ici c'est le component httpfoundation et j'utilise jsonresponse.
use Symfony\Component\HttpFoundation\JsonResponse;
//ici le component pour les annotation de routing
use Symfony\Component\Routing\Annotation\Route;
//ici le component authentication pour autentifier un user.
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

//la class s'appel securityController
class LoginController extends AbstractController
{
    //ici le routing avec le lien URL et la méthode POST puisque j'envoie des données via la requette HTTP.
    #[Route(path: '/api/login', name: 'app_login', methods:['POST'])]
    //j'attend un jsonresponse
    public function login(AuthenticationUtils $authenticationUtils): JsonResponse
    {

        //Obtenir l'erreur de connexion s'il y en a une.
        $error = $authenticationUtils->getLastAuthenticationError();
        //Dernier nom d'utilisateur saisi par l'utilisateur
        $lastUsername = $authenticationUtils->getLastUsername();
        
        //retourne la réponse sous forme de json
        return new JsonResponse
        (
            [
                'status'=>true,
                'message'=>'Connexion ok !'
                ]
        );
    }

    //ici la route de déconnexion
    #[Route(path: '/api/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
