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

    #[Route('/primes', name: 'app_prime_numbers')]
    public function listPrimeNumbers(): Response
    {
        $numbers = $this->primeNumberService->analyzeNumberRange();

        $template = $this->render('primes/list.html.twig', [
            'numbers' => $numbers,
        ]);

        return new Response($template->getContent());
    }
}
