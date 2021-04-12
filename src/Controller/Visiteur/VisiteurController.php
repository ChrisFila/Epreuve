<?php

namespace App\Controller\Visiteur;

use App\Entity\CompteRendu;
use App\Entity\Presentation;
use App\Form\CompteRenduType;
use App\Form\PresentationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\UserRepository;


#[Route('/visiteur')]
class VisiteurController extends AbstractController
{
    private EntityManagerInterface $entityManagerInterface;
    private UserRepository $userRepository;

    public function __construct(
        EntityManagerInterface $entityManagerInterface,
        UserRepository $userRepository)
    {
        $this->entityManagerInterface = $entityManagerInterface;
        $this->userRepository = $userRepository;
    }
    

    #[Route('/', name: 'visiteur.homepage.index')]
    public function index():Response
    {
        return $this->render('visiteur/index.html.twig');
    }


    #[Route('/nouveau', name: 'visiteur.nouveau_compte_rendu')]
    public function nouveau_compte_rendu(Request $request):Response
    {
        $compte_rendu = new CompteRendu();
        $presentation = new Presentation();
        $presentation->setCompteRendu($compte_rendu);
        $compte_rendu->addPresentation($presentation);

        $form = $this->createForm(CompteRenduType::class, $compte_rendu);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $this->entityManagerInterface->persist($compte_rendu);
            $this->entityManagerInterface->persist($presentation);
            $this->entityManagerInterface->flush();
            
            $this->addFlash('notice', "Votre compte-rendu a été enregistré avec succès.");
            return $this->redirectToRoute('visiteur.homepage.index');
        }

        return $this->render('visiteur/nouveau_cr.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/lister', name:'visiteur.lister_users')]
    public function lister(): Response
    {
        $listUsers=$this->userRepository->findAllUser();

        return $this->render('visiteur/lister_users.html.twig', [
            'listUsers' => $listUsers,
        ]);
    }
}