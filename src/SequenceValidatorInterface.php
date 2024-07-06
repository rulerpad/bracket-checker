<?php

declare(strict_types=1);

namespace Rulerpad\BracketChecker;

interface SequenceValidatorInterface
{
    public function validate(string $sequence): void;
}
