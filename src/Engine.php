<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function getPlayerName()
{
    return prompt('May I have your name?');
}

function getPlayerAnswer($question)
{
    return prompt("Question: {$question}");
}

function getNumberRounds()
{
    return 3;
}

function getRandomNumbers($count = 2)
{
    $result = [];
    for ($i = 1; $i <= $count; $i++) {
        $result[] = rand(1, 100);
    }

    return $result;
}

function printWelcomeMsg()
{
    line('Welcome to the Brain Games!');
}

function printGreetingMsg($name)
{
    line("Hello, %s!", $name);
}

function printPlayerAnswerMsg($playerAnswer)
{
    line("Your answer: %s", $playerAnswer);
}

function printWrongAnswerMsg($playerAnswer, $correctAnswer, $name)
{
    line("'%s' is wrong answer ;(. Correct answer was '%s'.", $playerAnswer, $correctAnswer);
    line("Let's try again, %s!", $name);
}

function printCorrectMsg()
{
    line("Correct!");
}

function printCongratulationMsg($name)
{
    line("Congratulations, %s!", $name);
}
