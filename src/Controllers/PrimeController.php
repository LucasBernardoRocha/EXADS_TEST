<?php

namespace App\Controllers;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Services\PrimeNumberService;

class PrimeController extends AbstractController
{
    private PrimeNumberService $primeNumberService;

    public function __construct(PrimeNumberService $primeNumberService)
    {
        $this->primeNumberService = $primeNumberService;
    }

    #[Route('/primes', name: 'prime_numbers')]
    public function index(): Response
    {
        $numbers = $this->primeNumberService->analyzeNumberRange();

        return $this->render('primes.html.twig', [
            'numbers' => $numbers,
        ]);
    }
}
