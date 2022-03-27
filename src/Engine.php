<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

define("NUMBER_ROUNDS", 3);

function getPlayerName()
{
    return prompt('May I have your name?');
}

function getPlayerAnswer(mixed $question)
{
    return prompt("Question: {$question}");
}

function getNumberRounds()
{
    return $NUMBER_ROUNDS;
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

function printGreetingMsg(mixed $name)
{
    line("Hello, %s!", $name);
}

function printPlayerAnswerMsg(mixed $playerAnswer)
{
    line("Your answer: %s", $playerAnswer);
}

function printWrongAnswerMsg(mixed $playerAnswer, mixed $correctAnswer, mixed $name)
{
    line("'%s' is wrong answer ;(. Correct answer was '%s'.", $playerAnswer, $correctAnswer);
    line("Let's try again, %s!", $name);
}

function printCorrectMsg()
{
    line("Correct!");
}

function printCongratulationMsg(mixed $name)
{
    line("Congratulations, %s!", $name);
}
