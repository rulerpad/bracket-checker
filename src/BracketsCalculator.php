<?php

declare(strict_types=1);

namespace Rulerpad\BracketChecker;

class BracketsCalculator implements BracketsCalculatorInterface
{
    private const ALL_BRACKETS_CLOSED = 0;
    private const INDEX_INIT = 0;
    private int $index;

    public function __construct()
    {
        $this->index = self::INDEX_INIT;
    }

    public function increase(): void
    {
        $this->index++;
    }

    public function decrease(): void
    {
        $this->index--;
    }

    public function isAllBracketsClosed(): bool
    {
        return $this->index === self::ALL_BRACKETS_CLOSED;
    }
}
