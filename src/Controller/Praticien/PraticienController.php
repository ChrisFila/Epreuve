<?php

namespace App\Controller\Praticien;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PraticienRepository;


#[Route('/praticien')]
class PraticienController extends AbstractController
{
    public function __construct(
        PraticienRepository $praticienRepository)

    {
        $this->praticienRepository = $praticienRepository;
    }


    #[Route('/liste', name: 'praticien.liste')]
    public function index(): Response
    {
        $liste_praticiens = $this->praticienRepository->findAll();

        return $this->render('praticien/liste.html.twig', [
            'liste_praticiens' => $liste_praticiens,
        ]);
    }
}
