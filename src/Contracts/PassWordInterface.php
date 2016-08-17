<?php

namespace Cheezykins\PassGen\Contracts;

interface PassWordInterface
{
    /**
     * PassWordInterface constructor.
     *
     * @param string $passWord The password in plain text
     */
    public function __construct($passWord);

    /**
     * Return the password in plain text.
     *
     * @return string
     */
    public function getPlainText();

    /**
     * Return the password as a hash compatible with password_verify().
     *
     * @return string
     */
    public function getHash();
}
