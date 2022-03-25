<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function startGame()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line("Answer \"yes\" if the number is even, otherwise answer \"no\".");

    define("NUMBER_GAMES", 3);
    define("MIN_NUMBER", 1);
    define("MAX_NUMBER", 100);

    for ($i = 1; $i <= NUMBER_GAMES; $i++) {
        $randomNumber = rand(MIN_NUMBER, MAX_NUMBER);
        $correctAnswer = $randomNumber % 2 === 0 ? "yes" : "no";

        $userAnswer = prompt("Question: {$randomNumber}");

        if ($userAnswer !== $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }

        line("Correct!");
    }

    line("Congratulations, %s!", $name);
}
