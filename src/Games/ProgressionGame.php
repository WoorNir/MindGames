<?php

namespace Php\Project\Games\Progression;

use function Php\Project\Engine\runGame;

const GAME_DESCRIPTION = "What number is missing in the progression?";

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
/**
 * Define function to get arythmetic progression with one empty slot
 */
function getProgression(int $firstNumber, int $difference, int $length): array
{
    $gameProgression = [];
    for ($i = 0; $i < $length; $i++) {
        $value = $firstNumber + $i * $difference;
        $gameProgression[] = $value;
    }
    $i = rand(1, $length - 1); // Index for missing number in progression
    $missingNumber = strval($gameProgression[$i]);
    $gameProgression[$i] = "..";
    $gameProgression = implode(" ", $gameProgression);
    return [$gameProgression, $missingNumber];
}
