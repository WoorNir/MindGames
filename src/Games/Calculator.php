<?php

namespace Php\Project\Games\Calc;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\runGame;

const GAME_DESCRIPTION = "What is the result of the expression?";

/**
 * At first, describe simple calc, which we'll need
 * in our fuction to get question and correct answer
 */
function gameCalc(int $a, int $b, string $operand): string
{
    switch ($operand) {
        case '+':
            $result = $a + $b;
            break;
        case '-':
            $result = $a - $b;
            break;
        case '*':
            $result = $a * $b;
            break;
    }
    return $result;
}

function playGameCalc()
{
    // getting needed variables
    $callable = function () {
        $possibleActions = ['+', '-', '*'];    // Possible operations in game
        $i = rand(0, 2);
        $currentAction = $possibleActions[$i]; //Choosing current action randomly
        $a = rand(1, 50);
        $b = rand(0, 10);
        $question = "{$a} {$currentAction} {$b}";
        $correctAnswer = gameCalc($a, $b, $currentAction);
        return [$question, $correctAnswer]; //order is matter
    };
    runGame(GAME_DESCRIPTION, $callable);
}
