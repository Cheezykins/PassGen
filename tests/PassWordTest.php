<?php

namespace Cheezykins\PassGen\Tests;

use Cheezykins\PassGen\Exceptions\PasswordTooLongException;
use Cheezykins\PassGen\PassWord;
use PHPUnit\Framework\TestCase;

class PassWordTest extends TestCase
{
    public function testPassWordRequiresString()
    {
        $this->expectException(\TypeError::class);
        $password = new PassWord(-74);
    }

    public function testPassWordReturnsInput()
    {
        $password = new PassWord('123');
        $this->assertEquals('123', $password->getPlainText());
    }

    public function testPassWordGeneratesHash()
    {
        $password = new PassWord('123');
        $this->assertTrue(password_verify('123', $password->getHash()));
    }

    public function testPasswordCannotBeTooLong()
    {
        $this->expectException(PasswordTooLongException::class);

        $password = new PassWord('I gave a cry of astonishment. I saw and thought nothing of the other four Martian monsters; my attention was riveted upon the nearer incident. Simultaneously two other shells burst in the air near the body as the hood twisted round in time to receive, but not in time to dodge, the fourth shell.');
    }

    public function testMagicToStringReturnsHash()
    {
        $password = new PassWord('123');
        $this->assertEquals($password->getHash(), (string) $password);
    }
}
