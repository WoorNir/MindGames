<?php

namespace Php\Project\Games\Gcd;

use function Php\Project\Engine\runGame;

const GAME_DESCRIPTION = "Find the greatest common divisor of given numbers.";

function playGcd()
{
    // getting variables for gaming question and correct answer
    $callable = function () {
        $firstQuestionNumber = rand(1, 100);
        $secondQuestionNumber = rand(1, 100);
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
function findGcd($firstNumber, $secondNumber): string
{
    while ($secondNumber !== 0) {
        $temp = $secondNumber;
        $secondNumber = $firstNumber % $secondNumber;
        $firstNumber = $temp;
    }
    return $firstNumber;
}
