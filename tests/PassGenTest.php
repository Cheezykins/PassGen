<?php

namespace Cheezykins\StringIncrementer\Tests;

use Cheezykins\PassGen\Exceptions\PasswordTooLongException;
use Cheezykins\PassGen\PassGen;
use Cheezykins\PassGen\PassWord;

class PassGenTest extends \PHPUnit_Framework_TestCase
{

    public function testGenerateRequiresInteger()
    {
        $this->expectException(\TypeError::class);
        $password = PassGen::generate(0.2);
        $password = PassGen::generate(-20);
        $password = PassGen::generate(4.7);
    }

    public function testPassGenReturnsPassword()
    {
        $password = PassGen::generate();
        $this->assertInstanceOf(PassWord::class, $password);
    }


}
