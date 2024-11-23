<?php

namespace Php\Project\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_REQUIRED = 3;
/**
 * Function to start the game
 * contain 2 parameters: game rules, and function to get needed variables of question and correct answer
 */
function runGame(string $gameDescription, callable $arrayOfVariables): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($gameDescription);
    /**
     * describing the main game logic
     */
    for ($roundsWon = 0; $roundsWon < ROUNDS_REQUIRED; $roundsWon++) {
        [$question, $correctAnswer] = $arrayOfVariables();
        line("Question: %s", $question); // asking User
        $answer = trim(strtolower(prompt("Your answer")));

        if ($answer === $correctAnswer) {
            line("Correct!");
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'");
            line("Let's try again, $name!");
            return;
        }
    }

    line("Congratulations, %s! You won the game!", $name);
}
