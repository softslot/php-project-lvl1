<?php

namespace Brain\Games\Prime;

use function cli\line;
use function Brain\Games\Engine\{getPlayerName, getPlayerAnswer, getNumberRounds};
use function Brain\Games\Engine\{printWelcomeMsg, printGreetingMsg, printPlayerAnswerMsg};
use function Brain\Games\Engine\{printCongratulationMsg, printWrongAnswerMsg, printCorrectMsg};
use function Brain\Games\Engine\{getRandomNumbers};

function startGame()
{
    printWelcomeMsg();
    $name = getPlayerName();
    printGreetingMsg($name);

    line("Answer \"yes\" if given number is prime. Otherwise answer \"no\".");

    for ($round = 1; $round <= getNumberRounds(); $round++) {
        [$randNum] = getRandomNumbers(1);

        $correctAnswer = isPrime($randNum) ? "yes" : "no";

        $question = "{$randNum}";
        $playerAnswer = getPlayerAnswer($question);
        printPlayerAnswerMsg($playerAnswer);

        if (strval($playerAnswer) !== strval($correctAnswer)) {
            printWrongAnswerMsg($playerAnswer, $correctAnswer, $name);
            return;
        }

        printCorrectMsg();
    }

    printCongratulationMsg($name);
}

function isPrime(int $num)
{
    if ($num < 2) {
        return false;
    }

    for ($devisor = 2; $devisor <= $num / 2; $devisor++) {
        if ($num % $devisor === 0) {
            return false;
        }
    }

    return true;
}
