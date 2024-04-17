<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\ChocoblastService;
use App\Form\ChocoblastType;
use App\Entity\Chocoblast;
use App\Repository\ChocoblastRepository;

class ChocoblastController extends AbstractController
{

    public function __construct(
        private readonly ChocoblastService $chocoblastService
    ) {
    }
    #[Route('/chocoblast/add', name: 'app_chocoblast_add')]
    public function create(
        Request $request,
    ): Response {

        $chocoblast = new Chocoblast();
        //création du formulaire
        $form = $this->createForm(ChocoblastType::class, $chocoblast);
        //récupération de la requête
        $form->handleRequest($request);
        //test si le formulaire est submit
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                //ajout du chocoblast en BDD
                $chocoblast->setStatus(false);
                $this->chocoblastService->create($chocoblast);
            } catch (\Throwable $th) {
                $this->addFlash("danger", $th->getMessage());
            }
        }
        return $this->render('chocoblast/addChocoblast.html.twig', [
            'formulaire' => $form,
        ]);
    }

    #[Route('/chocoblast/all', name: 'app_chocoblast_all')]
    public function showAllChocoblast(): Response
    {
        $chocoblasts = $this->chocoblastService->findActive();

        return $this->render('chocoblast/showAllChocoblast.html.twig', [
            'chocoblasts' => $chocoblasts,
        ]);
    }

    #[Route('/chocoblast/all/enable', name: 'app_chocoblast_all')]
    public function showAllChocoblastEnable(): Response
    {
        $chocoblasts = $this->chocoblastService->findIsNotActive();

        return $this->render('chocoblast/showAllChocoblast.html.twig', [
            'chocoblasts' => $chocoblasts,
        ]);
    }

    #[Route('/chocoblast/activate/{id}', name: 'app_chocoblast_activate')]
    public function chocoblastActive($id): Response
    {
        //récupération du chocoblast
        $chocoblasts = $this->chocoblastService->findOneBy($id);
        //test si le chocoblast existe
        if ($chocoblasts) {
            //modifier le status
            $chocoblasts->setStatus(true);
            $this->chocoblastService->update($chocoblasts);
            //redirige vers la connexion
            return $this->redirectToRoute('app_chocoblast_all');
        }
        //si il n'existe pas on regirige vers la création de compte
        return $this->redirectToRoute('app_register_create');
    }
}
