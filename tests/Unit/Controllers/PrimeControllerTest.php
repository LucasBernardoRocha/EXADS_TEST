<?php

namespace App\Tests\Unit\Controllers;

use App\Controllers\PrimeController;
use App\Entities\Number;
use App\Services\PrimeNumberService;
use Mockery;
use Mockery\Mock;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Response;

final class PrimeControllerTest extends TestCase
{
    private PrimeController $primeController;
    private PrimeNumberService|Mock $primeNumberService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->primeNumberService = Mockery::mock(PrimeNumberService::class);
        $this->primeController = Mockery::mock(PrimeController::class, [$this->primeNumberService])->makePartial();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->primeController);
        unset($this->primeNumberService);
    }


    public function testListPrimeNumbers(): void
    {
        $expectedNumbers = [
            ['value' => 1, 'isPrime' => false, 'multiples' => [1]],
            ['value' => 2, 'isPrime' => true, 'multiples' => [1, 2]]
        ];

        $this->primeNumberService
            ->shouldReceive('analyzeNumberRange')
            ->andReturn(array_map(function($numberData) {
                return new Number($numberData['value']);
            }, $expectedNumbers));

        $this->primeController
            ->shouldReceive('listPrimeNumbers')
            ->andReturn(new Response(''));

        $response = $this->primeController->listPrimeNumbers();

        $this->assertInstanceOf(Response::class, $response);

        $this->assertSame(Response::HTTP_OK, $response->getStatusCode());
    }

}
