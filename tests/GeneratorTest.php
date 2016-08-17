<?php

namespace Cheezykins\PassGen\Tests;

use Cheezykins\PassGen\Contracts\PasswordGeneratorInterface;
use Cheezykins\PassGen\Contracts\PassWordInterface;
use Cheezykins\PassGen\Generator;
use PHPUnit\Framework\TestCase;

class GeneratorTest extends TestCase
{
    /**
     * @var PasswordGeneratorInterface
     */
    protected $generator;

    protected function setUp()
    {
        $this->generator = new Generator();
    }

    public function testGenerateRequiresInteger()
    {
        $this->expectException(\TypeError::class);
        $this->generator->generate(0.2);
        $this->generator->generate(-20);
        $this->generator->generate(4.7);
    }

    public function testPassGenReturnsPassword()
    {
        $password = $this->generator->generate();
        $this->assertInstanceOf(PassWordInterface::class, $password);
    }

    public function testPassGenBulkRequiresPositiveInt()
    {
        $this->expectException(\TypeError::class);
        $this->generator->bulkGenerate(-20);
        $this->generator->bulkGenerate(0.5);
        $this->generator->bulkGenerate(4.2);
    }

    public function testPassGenBulkReturnsPassWordArray()
    {
        $passwords = $this->generator->bulkGenerate(3);
        $this->assertInternalType('array', $passwords);
        foreach ($passwords as $password) {
            $this->assertInstanceOf(PassWordInterface::class, $password);
        }
    }

    public function testPassGenBulkReturnsRightCount()
    {
        $passwords = $this->generator->bulkGenerate(20);
        $this->assertCount(20, $passwords);
    }
}
