<?php

declare(strict_types=1);

namespace Rulerpad\BracketChecker;

class SequenceParser implements SequenceParserInterface
{
    public function __construct(private readonly BracketsCalculatorInterface $bracketsCalculator)
    {
    }

    public function parse(string $sequence): void
    {
        $elementCollection = str_split($sequence);

        foreach ($elementCollection as $element) {
            if (in_array($element, ValidElements::getSkipElement())) {
                continue;
            }

            match ($element) {
                ValidElements::OPEN_BRACKET => $this->bracketsCalculator->increase(),
                ValidElements::CLOSE_BRACKET => $this->bracketsCalculator->decrease(),
            };
        }
    }
}
