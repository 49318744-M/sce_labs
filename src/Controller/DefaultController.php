<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{
    #[Route('/hello/demo', name: 'app_hello_demo')]
    public function helloDemo(CarRepository $carRepository): Response
    {
        $allCars = $carRepository->findAll();

        return $this->render('demo/hello_demo.html.twig', [
            'cars' => $allCars,
        ]);
    }
}
