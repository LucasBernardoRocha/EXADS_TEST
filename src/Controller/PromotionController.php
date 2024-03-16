<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\PromotionService;

class PromotionController extends AbstractController
{
    private PromotionService $promotionService;

    public function __construct(PromotionService $promotionService)
    {
        $this->promotionService = $promotionService;
    }

    #[Route('/promotion/{promotion_id}', name: 'app_promotion_by_id')]
    public function getPromotionById(int $promotion_id): Response
    {
        $randomDesignId = $this->promotionService->getPromotionDesignId($promotion_id);

        if (!$randomDesignId) {
            throw new NotFoundHttpException("Promotion not found!");
        }

        return $this->redirectToRoute('app_promotion_by_design_id', [
            'promotion_id' => $promotion_id,
            'design_id' => $randomDesignId
        ]);
    }

    #[Route('/promotion/{promotion_id}/design/{design_id}', name: 'app_promotion_by_design_id')]
    public function getPromotionByDesignId(int $promotion_id, int $design_id): Response
    {
        try {
            $data = $this->promotionService->getPromotionAndDesignData($promotion_id, $design_id);

            if (!$data) {
                throw new NotFoundHttpException();
            }

            return $this->render('promotion/design.html.twig', $data);

        } catch (NotFoundHttpException $e) {
            throw $e;
        }
    }
}
