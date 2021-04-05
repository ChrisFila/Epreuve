<?php

namespace App\Controller\Visiteur;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


#[Route('/visiteur')]
class VisiteurController extends AbstractController
{
    #[Route('/', name: 'visiteur.homepage.index')]
    public function index():Response
    {
        return $this->render('visiteur/index.html.twig');
    }

    #[Route('/nouveau', name: 'visiteur.nouveau_compte_rendu')]
    public function nouveau_compte_rendu():Response
    {
        return $this->render('visiteur/nouveau_compte_rendu.html.twig');
    }
}