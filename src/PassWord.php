<?php

namespace Cheezykins\PassGen;

use Cheezykins\PassGen\Exceptions\CannotHashException;
use Cheezykins\PassGen\Exceptions\PasswordTooLongException;

final class PassWord
{
    private $passWord;
    private $hash;

    const HASH_MODE_LAZY = 1;
    const HASH_MODE_ACTIVE = 0;
    const HASH_MODE_DEFAULT = 0;

    /**
     * Creates a new PassWord from the given string.
     *
     * @param $passWord
     *
     * @param int $hashMode
     * @throws CannotHashException
     * @throws PasswordTooLongException
     * @throws \TypeError
     */
    public function __construct($passWord, $hashMode = self::HASH_MODE_DEFAULT)
    {
        if (!is_string($passWord)) {
            throw new \TypeError('Password is not a string');
        } elseif (strlen($passWord) > 72) { // BCrypt (well, blow-fish) truncates values over 72 bytes.
            throw new PasswordTooLongException('Your password cannot be over 72 characters');
        }

        $this->passWord = $passWord;
        if ($hashMode === self::HASH_MODE_ACTIVE)
        {
            $this->hashPassword();
        }
    }

    private function hashPassword()
    {
        $hash = password_hash($this->passWord, PASSWORD_DEFAULT, [
            'cost' => 11,
        ]);
        if ($hash === false)
        {
            throw new CannotHashException('Unable to hash the password');
        }
        $this->hash = $hash;
    }

    /**
     * Gets the plaintext password as a string.
     *
     * @return string
     */
    public function getPlainText()
    {
        return $this->passWord;
    }

    /**
     * Magic tostring method to return the hash.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getHash();
    }

    /**
     * Gets the password as a hash.
     *
     * @return string
     */
    public function getHash()
    {
        if ($this->hash === null)
        {
            $this->hashPassword();
        }
        return $this->hash;
    }
}
