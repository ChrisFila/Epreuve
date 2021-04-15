<?php

namespace App\Controller\Visiteur;


use App\Repository\UserRepository;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


#[Route('/visiteur')]
class VisiteurController extends AbstractController
{
    private UserRepository $userRepository;

    public function __construct(
        UserRepository $userRepository)

    {
        $this->userRepository = $userRepository;
    }


    #[Route('/liste', name:'visiteur.liste')]
    public function lister(): Response
    {
        $role_visiteur = 'visiteur';

        $liste_visiteurs = $this->userRepository->findUserWithRole($role_visiteur);
        dump($liste_visiteurs);
        return $this->render('visiteur/liste.html.twig', [
            'liste_visiteurs' => $liste_visiteurs,
        ]);
    }
}