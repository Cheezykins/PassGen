<?php

namespace Cheezykins\PassGen;

use Cheezykins\PassGen\Contracts\PasswordGeneratorInterface;

class Generator implements PasswordGeneratorInterface
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
    public function bulkGenerate($amount, $length = 6)
    {
        if (!is_int($amount) || $amount <= 0) {
            throw new \TypeError('Length must be a positive integer');
        }
        $passwords = [];
        for ($count = 0; $count < $amount; $count++) {
            $passwords[] = $this->generate($length);
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
    public function generate($length = 6)
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

        return new PassWord($passWordString);
    }
}
