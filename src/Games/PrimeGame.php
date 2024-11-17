<?php

namespace Php\Project\Games\Prime;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\runGame;

const GAME_DESCRIPTION = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";

/**
 * Realize function which checking prime number
 * and returning correct answer fo game
 */
function isPrime(int $number): string
{
    if ($number < 2) {
        return 'yes';
    }
    for ($i = 2; $i < $number / 2; $i++) {
        if ($number % $i === 0) {
            return 'no';
        }
    }
    return 'yes';
}

function playPrime()
{
    $callable = function () {
        $question = rand(1, 100);
        $correctAnswer = isPrime($question);
        return [$question, $correctAnswer];
    };
    runGame(GAME_DESCRIPTION, $callable);
}
