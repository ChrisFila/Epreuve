<?php

namespace App\Controller\Visiteur;


use App\Repository\UserRepository;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


#[Route('/visiteur')]
class VisiteurController extends AbstractController
{

    public function __construct(
        UserRepository $userRepository)

    {
        $this->userRepository = $userRepository;
    }


    #[Route('/liste', name:'visiteur.liste')]
    public function lister(): Response
    {
        return $this->render('visiteur/liste.html.twig', [
            'liste_visiteurs' => $this->userRepository->findAll(),
        ]);
    }
}