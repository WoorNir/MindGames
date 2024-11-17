<?php

namespace Php\Project\Games\Progression;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\runGame;

const GAME_DESCRIPTION = "What number is missing in the progression?";
/**
 * Define function to get arythmetic progression with one empty slot which is correct answer
 */
function getProgression($firstNumber, $difference, $length)
{
    $question = [];
    for ($i = 0; $i < $length; $i++) {
        $value = $firstNumber + $i * $difference;
        $question[] = $value;
    }
    $i = rand(1, $length - 1);
    $correctAnswer = strval($question[$i]);
    $question[$i] = "..";
    $question = implode(" ", $question);
    return [$question, $correctAnswer];
}

function playProgression()
{
    $callable = function () {
        $firstNumber = rand(2, 50);
        $difference = rand(2, 5);
        $length = rand(5, 10);
        [$question, $correctAnswer] = getProgression($firstNumber, $difference, $length);
        return [$question, $correctAnswer];
    };
    runGame(GAME_DESCRIPTION, $callable);
}
