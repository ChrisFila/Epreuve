<?php

namespace App\Controller\CompteRendu;

use App\Entity\CompteRendu;
use App\Entity\Presentation;
use App\Form\CompteRenduType;
use App\Form\PresentationType;
use App\Repository\CompteRenduRepository;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;


#[Route('/compte_rendu')]
class CompteRenduController extends AbstractController
{
    private EntityManagerInterface $entityManagerInterface;
    private CompteRenduRepository $compteRenduRepository;
    private Security $security;

    public function __construct(
        EntityManagerInterface $entityManagerInterface,
        CompteRenduRepository $compteRenduRepository,
        Security $security)
    {
        $this->entityManagerInterface = $entityManagerInterface;
        $this->compteRenduRepository = $compteRenduRepository;
        $this->security = $security;
    }
    

    #[Route('/liste', name: 'compte_rendu.liste')]
    public function liste_compte_rendu(): Response
    {
        $user = $this->security->getUser();
        $liste_compte_rendu = $this->compteRenduRepository->findAllWithUser($user);

        return $this->render('compte_rendu/liste.html.twig', [
            'liste_compte_rendu' => $liste_compte_rendu,
        ]);
    }


    #[Route('/nouveau', name: 'compte_rendu.nouveau')]
    public function nouveau_compte_rendu(Request $request): Response
    {
        $compte_rendu = new CompteRendu();
        $presentation = new Presentation();
        $presentation->setCompteRendu($compte_rendu);
        $compte_rendu->addPresentation($presentation);

        $form = $this->createForm(CompteRenduType::class, $compte_rendu);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

			dd($compte_rendu, $presentation);

            $this->entityManagerInterface->persist($compte_rendu);
            $this->entityManagerInterface->persist($presentation);
            $this->entityManagerInterface->flush();
            
            $this->addFlash('notice', "Votre compte-rendu a été enregistré avec succès.");
            return $this->redirectToRoute('compte_rendu.liste'); //TODO à modifier pour mes comptes-rendus
        }

        return $this->render('compte_rendu/nouveau.html.twig', [
            'form' => $form->createView(),
        ]);
    }


  
}
