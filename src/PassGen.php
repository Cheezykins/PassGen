<?php

namespace Cheezykins\PassGen;

class PassGen
{
    use EnglishWordList;

    /**
     * Generate a list of passwords $amount passwords long of $length words.
     *
     * @param int $amount
     * @param int $length
     * @param int $hashMode
     *
     * @throws \TypeError
     *
     * @return PassWord[]
     */
    public static function bulkGenerate($amount, $length = 6, $hashMode = PassWord::HASH_MODE_LAZY)
    {
        if (!is_int($amount) || $amount <= 0) {
            throw new \TypeError('Length must be a positive integer');
        }
        $passwords = [];
        for ($count = 0; $count < $amount; $count++) {
            $passwords[] = self::generate($length, $hashMode);
        }

        return $passwords;
    }

    /**
     * Generate a password up to $length words long.
     *
     * @param int $length
     * @param int $hashMode
     *
     * @throws \TypeError
     *
     * @return PassWord
     */
    public static function generate($length = 6, $hashMode = PassWord::HASH_MODE_DEFAULT)
    {
        if (!is_int($length) || $length <= 0) {
            throw new \TypeError('Length must be a positive integer');
        }
        $passWordElements = [];
        for ($count = 0; $count < $length; $count++) {
            $safeRandom = random_int(0, self::$listLength);
            $passWordElements[] = self::$wordList[$safeRandom];
        }

        $passWordString = implode('-', $passWordElements);

        return new PassWord($passWordString, $hashMode);
    }
}
