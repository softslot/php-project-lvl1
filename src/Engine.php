<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

define("NUMBER_ROUNDS", 3);

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

function getNumberRounds()
{
    return NUMBER_ROUNDS;
}

function getRandomNumbers(int $count = 2, int $min = 1, int $max = 100)
{
    $result = [];
    for ($i = 1; $i <= $count; $i++) {
        $result[] = rand($min, $max);
    }

    return $result;
}

function printWelcomeMsg()
{
    line('Welcome to the Brain Games!');
}

function printGreetingMsg(string $name)
{
    line("Hello, %s!", $name);
}

function printPlayerAnswerMsg(string $playerAnswer)
{
    line("Your answer: %s", $playerAnswer);
}

function printWrongAnswerMsg(string $playerAnswer, string $correctAnswer, string $name)
{
    line("'%s' is wrong answer ;(. Correct answer was '%s'.", $playerAnswer, $correctAnswer);
    line("Let's try again, %s!", $name);
}

function printCorrectMsg()
{
    line("Correct!");
}

function printCongratulationMsg(string $name)
{
    line("Congratulations, %s!", $name);
}
