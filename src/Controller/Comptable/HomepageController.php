<?php

namespace App\Controller\Comptable;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/comptable')]
class HomepageController extends AbstractController
{
    #[Route('/homepage', name: 'comptable.homepage.index')]
    public function index():Response
    {
        return $this->render('comptable/index.html.twig');
    }
}

