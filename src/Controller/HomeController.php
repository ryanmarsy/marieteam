<?php

namespace App\Controller;

use App\Repository\BateauRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(BateauRepository $bateauRepository): Response
    {
        return $this->render('home/home.html.twig', [
            'boats' => $bateauRepository->findAll()
        ]);
    }
}
