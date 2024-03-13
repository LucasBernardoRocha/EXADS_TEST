<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(Request $request): Response
    {
        $numbers = $this->primeNumberService->analyzeNumberRange(1, 100);

        return $this->render('primes.html.twig', [
            'numbers' => $numbers,
        ]);
    }
}
