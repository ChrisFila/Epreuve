<?php

namespace App\Controller\Praticien;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PraticienRepository;

class PraticienController extends AbstractController
{
    public function __construct(
        PraticienRepository $praticienRepository)
    {
        $this->praticienRepository = $praticienRepository;
    }

    #[Route('/praticien', name: 'praticien.index')]
    public function index(): Response
    {
        $listPraticiens=$this->praticienRepository->findAllPraticien();

        return $this->render('praticien/index.html.twig', [
            'listPraticiens' => $listPraticiens,
        ]);
    }
}
