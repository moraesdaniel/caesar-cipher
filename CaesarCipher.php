<?php

class CaesarCipher
{
    const FIRTS_LOWER_CASE_CHARACTER = 97;
    const LAST_LOWER_CASE_CHARACTER = 122;
    const FIRST_UPPER_CASE_CHARACTER = 65;
    const LAST_UPPER_CASE_CHARACTER = 90;

    public function encrypt(string $text, int $key): string
    {
        $factor = $key % 26;
        return implode('', array_map(function ($character) use ($factor) {
            $ascii = ord($character);
            $newCharacter = $ascii + $factor;
            if ($this->isLowerCaseCharacter($character)) {
                if ($newCharacter > self::LAST_LOWER_CASE_CHARACTER) {
                    return chr($newCharacter - self::LAST_LOWER_CASE_CHARACTER + 96);
                }
                return chr($newCharacter);
            } 

            if ($this->isUpperCaseCharacter($character)) {
                if ($newCharacter > self::LAST_UPPER_CASE_CHARACTER) {
                    return chr($newCharacter - self::LAST_UPPER_CASE_CHARACTER + 64);
                }
                return chr($newCharacter);
            }

            return $character;
        }, str_split($text)));
    }

    public function decrypt(string $text, int $key): string
    {
        $factor = $key % 26;
        return implode('', array_map(function ($character) use ($factor) {
            $ascii = ord($character);
            $newCharacter = $ascii - $factor;
            if ($this->isLowerCaseCharacter($character)) {
                if ($newCharacter < self::FIRTS_LOWER_CASE_CHARACTER) {
                    return chr($newCharacter + 26);
                }
                return chr($newCharacter);
            }

            if ($this->isUpperCaseCharacter($character)) {
                if ($newCharacter < self::FIRST_UPPER_CASE_CHARACTER) {
                    return chr($newCharacter + 26);
                }
                return chr($newCharacter);
            }

            return $character;
        }, str_split($text)));
    }

    private function isUpperCaseCharacter(string $character): bool
    {
        return ord($character) >= self::FIRST_UPPER_CASE_CHARACTER and 
            ord($character) <= self::LAST_UPPER_CASE_CHARACTER;
    }

    private function isLowerCaseCharacter(string $character): bool
    {
        return ord($character) >= self::FIRTS_LOWER_CASE_CHARACTER and 
            ord($character) <= self::LAST_LOWER_CASE_CHARACTER;
    }
}