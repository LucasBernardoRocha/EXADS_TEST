<?php

namespace App\Service;

use Exads\ABTestData;

class PromotionService
{
    public function getPromotionById(int $id): ?int
    {
        $abTest = new ABTestData($id);

        $rand = rand(1, 100);
        $cumulativePercent = 0;

        foreach ($abTest->getAllDesigns() as $design) {
            $cumulativePercent += $design['splitPercent'];

            if ($rand <= $cumulativePercent) {
                return $design['designId'];
            }
        }

        return null;
    }
}
