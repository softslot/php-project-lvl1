<?php

namespace Brain\Games\GCD;

use function cli\line;
use function Brain\Games\Engine\getPlayerName;
use function Brain\Games\Engine\getPlayerAnswer;
use function Brain\Games\Engine\getNumberRounds;
use function Brain\Games\Engine\printWelcomeMsg;
use function Brain\Games\Engine\printGreetingMsg;
use function Brain\Games\Engine\printPlayerAnswerMsg;
use function Brain\Games\Engine\printCongratulationMsg;
use function Brain\Games\Engine\printWrongAnswerMsg;
use function Brain\Games\Engine\printCorrectMsg;
use function Brain\Games\Engine\getRandomNumbers;

function startGame()
{
    printWelcomeMsg();
    $name = getPlayerName();
    printGreetingMsg($name);

    line("Find the greatest common divisor of given numbers.");

    for ($i = 1; $i <= getNumberRounds(); $i++) {
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

        if (strval($playerAnswer) !== strval($correctAnswer)) {
            printWrongAnswerMsg($playerAnswer, $correctAnswer, $name);
            return;
        }

        printCorrectMsg();
    }

    printCongratulationMsg($name);
}
