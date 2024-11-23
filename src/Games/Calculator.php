<?php

namespace Php\Project\Games\Calc;

use function Php\Project\Engine\runGame;

const GAME_DESCRIPTION = "What is the result of the expression?";

function playGameCalc(): void
{
    // getting needed variables
    $callable = function(): array {
        $possibleActions = ['+', '-', '*'];    // Possible operations in game
        $operandIndex = rand(0, 2);
        $currentAction = $possibleActions[$operandIndex]; //Choosing current action randomly

        $firstQuestionNum = rand(1, 50);
        $secondQuestionNum = rand(0, 10);
        $question = "{$firstQuestionNum} {$currentAction} {$secondQuestionNum}";

        $correctAnswer = calculate($firstQuestionNum, $secondQuestionNum, $currentAction);
        return [$question, $correctAnswer]; //order is matter
    };
    
    runGame(GAME_DESCRIPTION, $callable);
}
/**
 * Describe simple calc, which we need
 * in our fuction to get question and correct answer
 */
function calculate(int $firstNum, int $secontNum, string $operand): string
{
    switch ($operand) {
        case '+':
            $result = $firstNum + $secontNum;
            break;
        case '-':
            $result = $firstNum - $secontNum;
            break;
        case '*':
            $result = $firstNum * $secontNum;
            break;
        default:
            $result = "Incorrect input parameters in calculate function";
    }
    return $result;
}
