<?php

declare(strict_types=1);

namespace kaasplootz\uuid_generator;

class UuidGenerator
{
    private int $length;
    private array $possibleCharacters = [
        'nums' => [1,2,3,4,5,6,7,8,9,0],
        'letters' => ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z']
    ];

    public function __construct(
        int $length = 16
    ) {
        $this->length = $length;
    }

    public function generate(array $alreadyAssigned = [], int $length = null): string
    {
        if (is_null($length)) {
            $length = $this->length;
        }
        while(true) {
            $uuid = '';
            for ($i = 0; $i < $length;$i++) {
                $char = $this->getRandomChar();

                $uuid .= $this->getRandomLowerLetter($char);
            }

            if (!$this->isAlreadyAssigned($uuid, $alreadyAssigned))
                return $uuid;
        }
    }

    private function getRandomChar(): string
    {
        $characterType = array_rand($this->possibleCharacters);
        return (string) $this->possibleCharacters[$characterType][array_rand($this->possibleCharacters[$characterType])];
    }

    private function getRandomLowerLetter(string $char): string
    {
        $i = rand(0, 1);

        if ($i == 0)
            return strtolower($char);
        else
            return $char;
    }

    private function isAlreadyAssigned(string $uuid, array $alreadyAssigned): bool
    {
        return in_array($uuid, $alreadyAssigned);
    }
}
