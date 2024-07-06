<?php

declare(strict_types=1);

namespace Rulerpad\BracketChecker;

class BracketChecker implements BracketCheckerInterface
{
    private readonly SequenceParserInterface $sequenceParser;

    public function __construct(
        private readonly BracketsCalculatorInterface $bracketsCalculator = new BracketsCalculator(),
        private readonly SequenceValidatorInterface $sequenceValidator = new SequenceValidator()
    ) {
        $this->sequenceParser = new SequenceParser($this->bracketsCalculator);
    }

    public function isValid(string $sequence): bool
    {
        $this->sequenceValidator->validate($sequence);

        $this->sequenceParser->parse($sequence);

        return $this->bracketsCalculator->isAllBracketsClosed();
    }
}
