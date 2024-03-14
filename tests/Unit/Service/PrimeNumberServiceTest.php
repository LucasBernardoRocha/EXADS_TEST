<?php

namespace App\Tests\Unit\Service;

use App\Entity\Number;
use App\Service\PrimeNumberService;
use PHPUnit\Framework\TestCase;

class PrimeNumberServiceTest extends TestCase
{
    private PrimeNumberService $service;

    protected function setUp(): void
    {
        $this->service = new PrimeNumberService();
    }

    public function testAnalyzeNumberRangeWithDefaultRange(): void
    {
        $results = $this->service->analyzeNumberRange();

        $this->assertCount(100, $results);
        $this->assertInstanceOf(Number::class, $results[0]);
        $this->assertEquals(1, $results[0]->getValue());
    }

    public function testAnalyzeNumberRangeWithCustomRange(): void
    {
        $results = $this->service->analyzeNumberRange(50, 75);

        $this->assertCount(26, $results);
        $this->assertInstanceOf(Number::class, $results[0]);
        $this->assertEquals(50, $results[0]->getValue());
        $this->assertEquals(75, $results[25]->getValue());
    }

    public function testAnalyzeNumberRangeWithReversedRange(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->service->analyzeNumberRange(10, 5);
    }
}
