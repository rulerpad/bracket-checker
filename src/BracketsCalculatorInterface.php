<?php

declare(strict_types=1);

namespace Rulerpad\BracketChecker;

interface BracketsCalculatorInterface
{
    public function increase(): void;
    public function decrease(): void;
    public function isAllBracketsClosed(): bool;
}
