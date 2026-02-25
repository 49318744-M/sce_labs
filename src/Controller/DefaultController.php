<?php

namespace App\Controller;

use App\Repository\BrandRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{
    #[Route('/hello/demo', name: 'app_hello_demo')]
    public function helloDemo(BrandRepository $brandRepository): Response
    {
        $brands = $brandRepository->findAll();
        return $this->render('demo/hello_demo.html.twig', [
            'brands' => $brands,
        ]);
    }
}
