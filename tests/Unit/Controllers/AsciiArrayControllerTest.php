<?php
namespace App\Tests\Unit\Controllers;

use App\Controllers\AsciiArrayController;
use Mockery;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Response;

final class AsciiArrayControllerTest extends TestCase
{
    private AsciiArrayController $asciiArrayController;

    protected function setUp(): void
    {
        parent::setUp();

        $this->asciiArrayController = Mockery::mock(AsciiArrayController::class, [$this->asciiArrayController])->makePartial();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->asciiArrayController);
    }


    public function testListPrimeNumbers(): void
    {
        $this->asciiArrayController
            ->shouldReceive('generateMissingCharacter')
            ->andReturn(new Response(''));

        $response = $this->asciiArrayController->generateMissingCharacter();

        $this->assertInstanceOf(Response::class, $response);

        $this->assertSame(Response::HTTP_OK, $response->getStatusCode());
    }

}