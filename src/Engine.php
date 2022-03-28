<?php

namespace Brain\Games\Engine;

use function cli\{line, prompt};

const NUMBER_ROUNDS = 3;

function gameplay(string $title, callable $game)
{
    line('Welcome to the Brain Games!');
    $name = getPlayerName();
    line("Hello, %s!", $name);
    line($title);

    for ($round = 1; $round <= NUMBER_ROUNDS; $round += 1) {
        [$question, $correctAnswer] = $game();
        $playerAnswer = getPlayerAnswer($question);
        line("Your answer: %s", $playerAnswer);

        if (strval($playerAnswer) !== strval($correctAnswer)) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $playerAnswer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }
        line("Correct!");
    }
    line("Congratulations, %s!", $name);
}

function getPlayerName()
{
    return prompt('May I have your name?');
}

function getPlayerAnswer(string $question)
{
    return prompt("Question: {$question}");
}
