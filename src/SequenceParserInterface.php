<?php

declare(strict_types=1);

namespace Rulerpad\BracketChecker;

interface SequenceParserInterface
{
    public function parse(string $sequence): void;
}
