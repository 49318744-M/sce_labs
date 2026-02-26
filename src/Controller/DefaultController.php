<?php

namespace App\Controller;

use App\Repository\BrandRepository;
use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{
    public function __construct(
        private CarRepository $carRepository,
        private BrandRepository $brandRepository
    ) {}

    #[Route('/hello/demo', name: 'app_hello_demo')]
    public function helloDemo(): Response
    {
        $brand = $this->brandRepository->find(1);
        $newCar = new \App\Entity\Car();
        $newCar->setName('BMW');
        $newCar->setBrand($brand);

        $this->carRepository->save($newCar, true);

        $allCars = $this->carRepository->findCarsWithIdGreater(1);
        return $this->render(
            'demo/hello_demo.html.twig',
            [ 'cars' => $allCars,
            ]
        );
    }

}
