<?php
namespace App\UseCase;

use App\Service\MultiplierOperatorService;

class MultiplyUseCase
{
    // Inyectamos el servicio que creamos en el paso anterior
    public function __construct(
        private MultiplierOperatorService $multiplierService
    ) {}

    // Esta es la función que llamará el controlador
    public function execute(int $a, int $b): int
    {
        // Usamos el servicio para multiplicar
        return $this->multiplierService->multiply($a, $b);
    }
}
