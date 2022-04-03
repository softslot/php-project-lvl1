<?php

namespace Brain\Games\Engine;

use function cli\{line, prompt};

const NUMBER_ROUNDS = 3;

function run(string $description, callable $play)
{
    line('Welcome to the Brain Games!');
    $playerName = prompt('May I have your name?');
    line('Hello, %s!', $playerName);
    line($description);

    for ($round = 1; $round <= NUMBER_ROUNDS; $round += 1) {
        [$question, $correctAnswer] = $play();
        $playerAnswer = prompt("Question: {$question}");
        line('Your answer: %s', $playerAnswer);

        if (strval($playerAnswer) !== strval($correctAnswer)) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $playerAnswer, $correctAnswer);
            line("Let's try again, %s!", $playerName);
            return;
        }
        line('Correct!');
    }
    line('Congratulations, %s!', $playerName);
}
