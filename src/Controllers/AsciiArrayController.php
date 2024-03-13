<?php

namespace App\Controllers;

use App\Services\RandomAsciiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AsciiArrayController extends AbstractController
{
    private RandomAsciiService $randomAsciiService;

    public function __construct(RandomAsciiService $randomAsciiService)
    {
        $this->randomAsciiService = $randomAsciiService;
    }

    #[Route('/ascii', name: 'app_ascii_array')]
    public function generateMissingCharacter(): Response
    {

        $generatedArray = $this->randomAsciiService->getGeneratedArray();
        $this->randomAsciiService->removeRandomElement($generatedArray);
        $missingCharacter = $this->randomAsciiService->findMissingCharacter($generatedArray);

        $template = $this->render('ascii_array/missing_character.html.twig', [
            'generatedArray' => $generatedArray,
            'missingCharacter' => $missingCharacter,
        ]);

        return new Response($template->getContent());
    }
}
