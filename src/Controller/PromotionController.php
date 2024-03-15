<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\PromotionService;

class PromotionController extends AbstractController
{
    private PromotionService $promotionService;

    public function __construct(PromotionService $promotionService)
    {
        $this->promotionService = $promotionService;
    }

    #[Route('/promotion/{id}', name: 'app_promotion_by_id')]
    public function getPromotionById(int $id): Response
    {
        $randomDesignId = $this->promotionService->getPromotionById($id);

        if (!$randomDesignId) {
            throw $this->createNotFoundException('No designs found for the promotion');
        }

        // Pass only the randomDesignId to the template
        return $this->render('promotion/index.html.twig', [
            'randomDesignId' => $randomDesignId,
            'controller_name' => 'PromotionController',
        ]);
    }
}
