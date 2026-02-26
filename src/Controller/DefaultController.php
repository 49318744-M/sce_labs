<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{
    public function __construct(
        private CarRepository $carRepository
    ) {}
    #[Route('/hello/demo', name: 'app_hello_demo')]
    public function helloDemo(): Response
    {
        $car2 = $this->carRepository->find(2);
        $car2->setName('Super Toyota');
        $this->carRepository->save($car2, true);
        $allCars = $this->carRepository->findCarsWithIdGreater(1);
        return $this->render(
            'demo/hello_demo.html.twig',
            [ 'cars' => $allCars,
            ]
        );
    }

}
