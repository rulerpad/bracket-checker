<?php

declare(strict_types=1);

namespace Rulerpad\Informator\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Rulerpad\BracketChecker\BracketChecker;

class BracketCheckerTest extends TestCase
{
    /**
     * @dataProvider validCollectionDataProvider
     */
    public function testValid(string $sequence): void
    {
        $this->assertTrue((new BracketChecker())->isValid($sequence));
    }

    public function validCollectionDataProvider(): array
    {
        return [
            'inline' => ['()()'],
            'nested' => ['(()())'],
            'white space' => [' '],
            'nested + white spaces' => ['(()( ) )'],
            'new row' => ["\n"],
            'tabulatin' => ["\t"],
            'carriage return' => ["\r"],
        ];
    }

    /**
     * @dataProvider invalidCollectionDataProvider
     */
    public function testInvalid(string $sequence): void
    {
        $this->assertFalse((new BracketChecker())->isValid($sequence));
    }

    public function invalidCollectionDataProvider(): array
    {
        return [
            'inline' => ['(()'],
            'nested' => ['(()()()()))((((()()()))(()()()(((()))))))'],
        ];
    }

    /**
     * @dataProvider exceptionDataProvider
     */
    public function testThrowException(string $sequence)
    {
        $this->expectException(InvalidArgumentException::class);

        (new BracketChecker())->isValid($sequence);
    }

    public function exceptionDataProvider(): array
    {
        return [
            'invalid sequence with number' => ['(()()()(1)))((((()()()))(()()()(((()))))))'],
            'zero long' => [''],
            'numbers' => ['1']
        ];
    }
}
