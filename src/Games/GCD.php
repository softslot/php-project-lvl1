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
        [$secondRandNum, $firstRandNum] = getRandomNumbers(2);
        $smallNum = $firstRandNum < $secondRandNum ? $firstRandNum : $secondRandNum;

        $correctAnswer = 0;
        for ($divisor = 1; $divisor <= $smallNum; $divisor++) {
            if ($firstRandNum % $divisor === 0 && $secondRandNum % $divisor === 0) {
                $correctAnswer = $divisor;
            }
        }

        $question = "{$firstRandNum} {$secondRandNum}";
        $playerAnswer = getPlayerAnswer($question);
        printPlayerAnswerMsg($playerAnswer);

        if (intval($playerAnswer) !== intval($correctAnswer)) {
            printWrongAnswerMsg($playerAnswer, $correctAnswer, $name);
            return;
        }

        printCorrectMsg();
    }

    printCongratulationMsg($name);
}
