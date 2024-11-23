<?php

namespace Php\Project\Games\Gcd;

use function Php\Project\Engine\runGame;

const GAME_DESCRIPTION = "Find the greatest common divisor of given numbers.";

function playGcd(): void
{
    // getting variables for gaming question and correct answer
    $callable = function (): array {
        $firstQuestionNumber = rand(1, 50);
        $secondQuestionNumber = rand(1, 50);
        $question = "{$firstQuestionNumber} {$secondQuestionNumber}";
        $correctAnswer = findGcd($firstQuestionNumber, $secondQuestionNumber);
        return [$question, $correctAnswer];
    };

        runGame(GAME_DESCRIPTION, $callable);
}
/**
 * Realize function to find the Greatest Common Divisor
 * of two numbers. We'll need it in our next function to get correct
 * answer.
 */
function findGcd(int $firstNumber, int $secondNumber): string
{
    while ($secondNumber !== 0) {
        $temp = $secondNumber;
        $secondNumber = $firstNumber % $secondNumber;
        $firstNumber = $temp;
    }
    return $firstNumber;
}
