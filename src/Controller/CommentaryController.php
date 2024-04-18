<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\CommentaryType;
use App\Service\CommentaryService;
use App\Entity\Commentary;


class CommentaryController extends AbstractController
{
    #[Route('/commentary', name: 'app_commentary')]
    public function index(Request $request): Response
    {
        $commentary = new Commentary();
        $form = $this->createForm(CommentaryType::class, $commentary);
        $form-> handleRequest($request);
        
        return $this->render('commentary/index.html.twig', [
            'formaulaire' => $form->createView(),
        ]);
    }
}
