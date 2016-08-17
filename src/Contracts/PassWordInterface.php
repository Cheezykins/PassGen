<?php


namespace Cheezykins\PassGen\Contracts;


interface PassWordInterface
{

    const HASH_MODE_LAZY = 1;
    const HASH_MODE_ACTIVE = 0;
    const HASH_MODE_DEFAULT = self::HASH_MODE_LAZY;

    /**
     * PassWordInterface constructor.
     * @param string $passWord The password in plain text
     * @param int $hashMode The mode of hashing to use
     */
    public function __construct($passWord, $hashMode = self::HASH_MODE_DEFAULT);

    /**
     * Return the password in plain text
     * @return string
     */
    public function getPlainText();

    /**
     * Return the password as a hash compatible with password_verify()
     * @return string
     */
    public function getHash();
}