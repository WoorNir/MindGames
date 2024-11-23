<?php

namespace Php\Project\Games\Prime;

use function Php\Project\Engine\runGame;

const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function playPrime(): void
{
    $callable = function(): array {
        $question = rand(1, 100);
        isPrime($question) ? $correctAnswer = 'yes' : $correctAnswer = 'no';
        return [$question, $correctAnswer];
    };
    
    runGame(GAME_DESCRIPTION, $callable);
}
/**
 * Realize function which checking prime number
 * and returning correct answer fo game
 */
function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }
    for ($i = 2; $i < $number / 2; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
