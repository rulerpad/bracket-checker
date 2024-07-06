<?php

declare(strict_types=1);

namespace Rulerpad\BracketChecker;

use InvalidArgumentException;

class SequenceValidator implements SequenceValidatorInterface
{
    public function validate(string $sequence): void
    {
        $elementCollection = str_split($sequence);

        foreach ($elementCollection as $element) {
            if (false === in_array($element, ValidElements::getValidElementsCollection())) {
                throw new InvalidArgumentException;
            }
        }
    }
}
