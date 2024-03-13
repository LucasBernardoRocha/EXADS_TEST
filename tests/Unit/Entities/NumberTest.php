<?php

namespace App\Tests\Unit\Entities;

use App\Entities\Number;
use PHPUnit\Framework\TestCase;

final class NumberTest extends TestCase
{
    private Number $number;

    private int $value;

    protected function setUp(): void
    {
        parent::setUp();

        $this->value = 83;
        $this->number = new Number($this->value);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->number);
        unset($this->value);
    }

    public function testGetValue(): void
    {
        $this->assertEquals($this->value, $this->number->getValue());
    }

    public function testGetIsPrime()
    {
        $this->assertTrue($this->number->getIsPrime());
    }

    public function testIsPrimeWithNonPrimeNumber()
    {
        $this->number = new Number(6);
        $this->assertFalse($this->number->getIsPrime());
    }

    public function testIsPrimeWithLargeNumber()
    {
        $this->number = new Number(983);
        $this->assertTrue($this->number->getIsPrime());
    }
}
