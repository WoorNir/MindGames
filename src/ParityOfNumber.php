<?php

namespace Php\Project\Parity;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\runGame;

const GAME_DESCRIPTION = "Answer \"yes\" if the number is even, otherwise answer \"no\".";
/**
 * Starting the game
 */

function playBrainEven()
{
    // initialize function to get gaming question and correct answer
    $callable = function () {
        $question = rand(1, 100);
        $correctAnswer = $question % 2 === 0 ? 'yes' : 'no';
        return [$question, $correctAnswer];
    };
    runGame(GAME_DESCRIPTION, $callable);
}
