<?php

namespace Cheezykins\StringIncrementer\Tests;

use Cheezykins\PassGen\PassGen;
use Cheezykins\PassGen\PassWord;
use PHPUnit\Framework\TestCase;

class PassGenTest extends TestCase
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

    public function testPassGenBulkRequiresPositiveInt()
    {
        $this->expectException(\TypeError::class);
        $passwords = PassGen::bulkGenerate(-20);
        $passwords = PassGen::bulkGenerate(0.5);
        $passwords = PassGen::bulkGenerate(4.2);
    }

    public function testPassGenBulkReturnsPassWordArray()
    {
        $passwords = PassGen::bulkGenerate(3);
        $this->assertInternalType('array', $passwords);
        foreach ($passwords as $password)
        {
            $this->assertInstanceOf(PassWord::class, $password);
        }
    }

    public function testPassGenBulkReturnsRightCount()
    {
        $passwords = PassGen::bulkGenerate(20);
        $this->assertCount(20, $passwords);
    }


}
