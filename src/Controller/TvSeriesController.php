<?php

namespace App\Controller;

use App\Service\TvSeriesService;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TvSeriesController extends AbstractController
{
    private TvSeriesService $tvSeriesService;

    public function __construct(TvSeriesService $tvSeriesService)
    {
        $this->tvSeriesService = $tvSeriesService;
    }

    /**
     * @throws Exception
     */
    #[Route('/series', name: 'app_tv_series')]
    public function showNext(Request $request): Response
    {
        $title = $request->query->get('title');
        $dayOfWeek = $request->query->get('dayOfWeek');
        $dateTime = $request->query->get('dateTime');

        $nextSeries = $this->tvSeriesService->findNext($title, $dayOfWeek, $dateTime);

        return $this->render('tv_series/index.html.twig', [
            'next_series' => $nextSeries,
        ]);
    }
}
