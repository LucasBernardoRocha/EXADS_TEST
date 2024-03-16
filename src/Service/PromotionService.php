<?php

namespace App\Service;

use Exads\ABTestData;
use Exads\ABTestException;
use Random\RandomException;

class PromotionService
{
    private ?ABTestData $cachedAbTestData = null;

    /**
     * Retorna o ID do design da promoção com base em uma seleção aleatória ponderada por porcentagens de divisão.
     *
     * @param int $promotionId
     * @return int|null
     * @throws ABTestException
     * @throws RandomException
     */
    public function getPromotionDesignId(int $promotionId): ?int
    {
        $abTest = $this->getABTestData($promotionId);

        if (!$abTest) {
            return null;
        }

        return $abTest->getRandomDesignId();
    }

    /**
     * Retorna dados da promoção e do design para exibição.
     *
     * @param int $promotionId
     * @param int $designId
     * @return array|null
     */
    public function getPromotionAndDesignData(int $promotionId, int $designId): ?array
    {
        try {
            $abTest = $this->getABTestData($promotionId);
            $promotionName = $abTest->getPromotionName();
            $design = $abTest->getDesign($designId);
            $designName = $design['designName'];

            return [
                'promotionName' => $promotionName,
                'designName' => $designName,
            ];
        } catch (ABTestException $e) {
            return null;
        }
    }

    /**
     * Retorna e armazena em cache ABTestData para um ID de promoção.
     *
     * @param int $promotionId
     * @return ABTestData|null
     * @throws ABTestException
     */
    private function getABTestData(int $promotionId): ?ABTestData
    {
        if ($this->cachedAbTestData && $this->cachedAbTestData->getPromotionId() === $promotionId) {
            return $this->cachedAbTestData;
        }

        $this->cachedAbTestData = new ABTestData($promotionId);
        return $this->cachedAbTestData;
    }
}
