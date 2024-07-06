<?php

declare(strict_types=1);

namespace Rulerpad\BracketChecker;

final class ValidElements
{
    public const OPEN_BRACKET = '(';
    public const CLOSE_BRACKET = ')';
    public const WHITE_SPACE = ' ';
    public const NEW_ROW = "\n";
    public const TABULATION = "\t";
    public const CARRIAGE_RETURN = "\r";

    public static function getValidElementsCollection(): array
    {
        return [
            self::OPEN_BRACKET,
            self::CLOSE_BRACKET,
            self::WHITE_SPACE,
            self::NEW_ROW,
            self::TABULATION,
            self::CARRIAGE_RETURN
        ];
    }

    public static function getSkipElement(): array
    {
        return [
            self::WHITE_SPACE,
            self::NEW_ROW,
            self::TABULATION,
            self::CARRIAGE_RETURN
        ];
    }
}
