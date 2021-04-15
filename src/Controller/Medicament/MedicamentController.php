<?php

namespace App\Controller\Medicament;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\MedicamentRepository;


#[Route('/medicament')]
class MedicamentController extends AbstractController
{ 
    public function __construct(
        MedicamentRepository $medicamentRepository)

    {
        $this->medicamentRepository = $medicamentRepository;
    }


    #[Route('/liste', name: 'medicament.liste')]
    public function index(): Response
    {
        $liste_medicaments = $this->medicamentRepository->findAll();

        return $this->render('medicament/liste.html.twig', [
            'liste_medicaments' => $liste_medicaments,
        ]);
    }
}
