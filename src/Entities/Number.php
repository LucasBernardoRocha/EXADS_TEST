<?php

namespace App\Entities;

class Number
{
    private int $value;
    private array $multiples;
    private bool $isPrime;

    public function __construct(int $value)
    {
        $this->value = $value;
        $this->calculateMultiples();
        $this->calculateIsPrime();
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function getMultiples(): array
    {
        return $this->multiples;
    }

    public function getIsPrime(): bool
    {
        return $this->isPrime;
    }

    private function calculateMultiples(): void
    {
        $this->multiples = [];
        for ($i = 1; $i <= $this->value; $i++) {
            if ($this->value % $i === 0) {
                $this->multiples[] = $i;
            }
        }
    }

    private function calculateIsPrime(): void
    {
        $this->isPrime = !($this->value <= 1);

        for ($i = 2; $i <= sqrt($this->value); $i++) {
            if ($this->value % $i === 0) {
                $this->isPrime = false;
                break;
            }
        }
    }
}
