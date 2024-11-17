<?php

namespace Php\Project\Games\Parity;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\runGame;

const GAME_DESCRIPTION = "Answer \"yes\" if the number is even, otherwise answer \"no\".";

function playBrainEven()
{
    // initialize function to get gaming question and correct answer
    $callable = function () {
        $question = rand(1, 100);
        $correctAnswer = $question % 2 === 0 ? 'yes' : 'no';
        return [$question, $correctAnswer]; // we should use exact that order in result
    };
    runGame(GAME_DESCRIPTION, $callable);
}
