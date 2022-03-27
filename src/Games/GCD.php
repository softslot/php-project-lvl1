<?php

namespace Brain\Games\GCD;

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

    line("Find the greatest common divisor of given numbers.");

    for ($round = 1; $round <= getNumberRounds(); $round++) {
        [$secondNumber, $firstNumber] = getRandomNumbers(2);
        $smallNumber = $firstNumber < $secondNumber ? $firstNumber : $secondNumber;

        $correctAnswer = 1;
        for ($j = 2; $j <= $smallNumber; $j++) {
            if ($firstNumber % $j === 0 && $secondNumber % $j === 0) {
                $correctAnswer = $j;
            }
        }

        $playerAnswer = getPlayerAnswer("{$firstNumber} {$secondNumber}");
        printPlayerAnswerMsg($playerAnswer);

        if (intval($playerAnswer) !== intval($correctAnswer)) {
            printWrongAnswerMsg($playerAnswer, $correctAnswer, $name);
            return;
        }

        printCorrectMsg();
    }

    printCongratulationMsg($name);
}
