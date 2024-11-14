<?php

namespace Php\Project\Cli;

use function cli\line;
use function cli\prompt;

/**
 * Вызываем приветственное сообщение с просьбой ввести имя
 */
function printWelcomeMessage()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
