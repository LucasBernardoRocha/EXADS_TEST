<?php

namespace App\Tests\Unit\Service;

use App\Service\RandomAsciiService;
use PHPUnit\Framework\TestCase;

class RandomAsciiServiceTest extends TestCase
{
    private RandomAsciiService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new RandomAsciiService();
    }

    public function testConstructGeneratesShuffledArray(): void
    {
        $generatedArray = $this->service->getGeneratedArray();

        $this->assertCount(81, $generatedArray);
        $this->assertNotSame(range(',', '|'), $generatedArray);
    }

    public function testRemoveRandomElementRemovesOneElement(): void
    {
        $originalArrayCount = count($this->service->getGeneratedArray());

        $this->service->removeRandomElement();

        $this->assertCount($originalArrayCount - 1, $this->service->getGeneratedArray());
    }

    public function testFindMissingCharacterReturnsMissingCharacter(): void
    {
        $this->service->removeRandomElement();

        $missingCharacter = $this->service->findMissingCharacter();

        $this->assertContains($missingCharacter, range(',', '|'));
        $this->assertNotContains($missingCharacter, $this->service->getGeneratedArray());
    }
}
