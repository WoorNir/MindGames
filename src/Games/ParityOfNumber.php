<?php

namespace Php\Project\Games\Parity;

use function Php\Project\Engine\runGame;

const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function playBrainEven()
{
    // initialize function to get gaming question and correct answer
    $callable = function () {
        $question = rand(1, 100);
        if (isEven($question)) {
            $correctAnswer = 'yes';
        } else {
            $correctAnswer = 'no';
        }
        return [$question, $correctAnswer]; // we should use exact that order in result
    };
    runGame(GAME_DESCRIPTION, $callable);
}

function isEven(int $number)
{
    return $number % 2 === 0;
}
