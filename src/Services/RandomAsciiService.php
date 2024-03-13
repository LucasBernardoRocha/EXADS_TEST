<?php

namespace App\Services;

class RandomAsciiService
{
    /** @var array The generated array of ASCII characters. */
    private array $asciiArray;

    /**
     * RandomAsciiService constructor.
     * Initializes the RandomAsciiService with a shuffled range of ASCII characters from ',' to '|'.
     */
    public function __construct()
    {
        $this->asciiArray = range(',', '|');
        shuffle($this->asciiArray);
    }

    /**
     * Removes a random element from the generated ASCII array.
     */
    public function removeRandomElement(): void
    {
        $randomIndex = array_rand($this->asciiArray);
        unset($this->asciiArray[$randomIndex]);
    }

    /**
     * Gets the generated ASCII array.
     *
     * @return array The generated ASCII array.
     */
    public function getGeneratedArray(): array
    {
        return $this->asciiArray;
    }

    /**
     * Finds and returns the missing character from the ASCII array.
     *
     * @return string The missing character.
     */
    public function findMissingCharacter(): string
    {
        $missingCharacter = array_diff(range(',', '|'), $this->asciiArray);
        return reset($missingCharacter);
    }
}
