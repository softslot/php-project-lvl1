<?php

namespace Brain\Games\Calc;

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

    line("What is the result of the expression?");

    $operators = ["+", "-", "*"];
    $lastIndex = count($operators) - 1;

    for ($round = 1; $round <= getNumberRounds(); $round++) {
        $randOperator = $operators[rand(0, $lastIndex)];
        [$firstRandNum, $secondRandNum] = getRandomNumbers(2, 0, 10);

        $correctAnswer = 0;
        switch ($randOperator) {
            case "+":
                $correctAnswer = $firstRandNum + $secondRandNum;
                break;
            case "-":
                $correctAnswer = $firstRandNum - $secondRandNum;
                break;
            case "*":
                $correctAnswer = $firstRandNum * $secondRandNum;
                break;
        }

        $question = "{$firstRandNum} {$randOperator} {$secondRandNum}";
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
