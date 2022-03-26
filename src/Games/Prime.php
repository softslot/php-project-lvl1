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

    for ($i = 1; $i <= getNumberRounds(); $i++) {
        [$randomNumber] = getRandomNumbers(1);

        $correctAnswer = "yes";
        $divisors = [2, 3, 5];
        foreach ($divisors as $divisor) {
            if ($randomNumber % $divisor === 0) {
                $correctAnswer = "no";
            }
        }

        $playerAnswer = getPlayerAnswer($randomNumber);
        printPlayerAnswerMsg($playerAnswer);

        if (strval($playerAnswer) !== strval($correctAnswer)) {
            printWrongAnswerMsg($playerAnswer, $correctAnswer, $name);
            return;
        }

        printCorrectMsg();
    }

    printCongratulationMsg($name);
}
