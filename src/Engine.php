<?php

namespace Php\Project\Engine;

use function cli\line;
use function cli\prompt;

/**
 * Function to start the game
 * contain 2 parameters: game rules, and function to get needed variables of question and correct answer
 */
function runGame(string $gameDescription, callable $arrayOfVariables)
{
    line('Welcome to the Brain Game!'); // greetings
    $name = prompt('May I have your name?'); // asking User's name
    line("Hello, %s!", $name); // personal greeting
    line($gameDescription); // displaying the game description

    /**
     * describing the main game logic
     */

    $roundsWon = 0; // Initialize the counter for won rounds
    while ($roundsWon < 3) {
        [$question, $correctAnswer] = $arrayOfVariables();
        line("Question: %s", $question); // asking User
        $answer = trim(strtolower(prompt("Your answer")));
        if ($answer === $correctAnswer) {
            $roundsWon += 1;
            line("Correct!");
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'");
            line("Let's try again, $name!");
            break;
        }
        if ($roundsWon === 3) {
            line("Congratulations, %s! You won the game!", $name);
        }
    }
}
