<?php

namespace Php\Project\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\runGame;

const GAME_DESCRIPTION = "Find the greatest common divisor of given numbers.";

/**
 * At first, realize function to find the Greatest Common Divisor
 * of two numbers. We'll need it in our next function to get correct
 * answer.
 */

function findGcd($a, $b): string
{
    while ($b !== 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}

function playGcd()
{
    // getting variables for gaming question and correct answer
    $callable = function () {
        $a = rand(1, 100);
        $b = rand(1, 100);
        $question = "{$a} {$b}";
        $correctAnswer = findGcd($a, $b);
        return [$question, $correctAnswer];
    };
        runGame(GAME_DESCRIPTION, $callable);
}
