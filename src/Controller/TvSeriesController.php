<?php

namespace App\Controller;

use App\Service\TvSeriesService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TvSeriesController extends AbstractController
{
    private TvSeriesService $tvSeriesService;

    public function __construct(TvSeriesService $tvSeriesService)
    {
        $this->tvSeriesService = $tvSeriesService;
    }

    #[Route('/series', name: 'app_tv_series')]
    public function showNext(): Response
    {
        $next_series = $this->tvSeriesService->findNext();


        return $this->render('tv_series/index.html.twig', [
            'next_series' => $next_series,
        ]);
    }
}
