<?php

namespace App\Controller\Visiteur;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

#[Route('/visiteur')]
class HomepageController extends AbstractController
{
    #[Route('/homepage', name: 'visiteur.homepage.index')]
    public function index():Response
    {
        return $this->render('homepage/index.html.twig');
    }
}