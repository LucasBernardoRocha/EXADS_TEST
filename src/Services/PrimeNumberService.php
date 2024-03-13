<?php

namespace App\Services;

use App\Entities\Number;

class PrimeNumberService
{
    public function analyzeNumberRange(int $first = 1, int $last = 100): array
    {
        $results = [];
        for ($i = $first; $i <= $last; $i++) {
            $results[] = new Number($i);
        }
        return $results;
    }
}
