<?php

namespace App\Controller;

use App\Repository\InstrumentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(InstrumentRepository $instrumentRepository): Response
    {
        $instruments = $instrumentRepository->findAll(); //get all instruments from db
        //dump($instruments); // print function
        // Appel le fichier template Twig avec le méthode render
        return $this->render('default/homePage.html.twig', [
            'instruments' => $instruments
        ]);
    }
}
