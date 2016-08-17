<?php

namespace Cheezykins\PassGen\Contracts;

interface PasswordGeneratorInterface
{
    /**
     * Generate a single password up to $length words long.
     *
     * @param int $length The number of words to use in the password
     *
     * @return PassWordInterface
     */
    public function generate($length = 6);

    /**
     * Generates $amount of passwords up to $length words long.
     *
     * @param int $amount The number of passwords to generate
     * @param int $length The number of words to use in the password
     *
     * @return PassWordInterface[]
     */
    public function bulkGenerate($amount, $length = 6);
}
