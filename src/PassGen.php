<?php


namespace Cheezykins\PassGen;


class PassGen
{

    use WordList;

    /**
     * @param int $length
     * @return PassWord
     * @throws \TypeError
     */
    public static function generate($length = 6)
    {
        if (!is_int($length) || $length <= 0)
        {
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