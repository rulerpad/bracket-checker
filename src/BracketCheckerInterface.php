<?php

declare(strict_types=1);

namespace Rulerpad\BracketChecker;

interface BracketCheckerInterface
{
    public function isValid(string $sequence): bool;
}
