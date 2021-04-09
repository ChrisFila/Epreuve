<?php

namespace App\Controller\Medicament;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\MedicamentRepository;


class MedicamentController extends AbstractController
{ 
    public function __construct(
        MedicamentRepository $medicamentRepository)
    {
        $this->medicamentRepository = $medicamentRepository;
    }


    #[Route('/medicament', name: 'medicament.index')]
    public function index(): Response
    {
        $listMedicaments=$this->medicamentRepository->findAllMedicament();

        return $this->render('medicament/index.html.twig', [
            'listMedicaments' => $listMedicaments,
        ]);
    }
}
