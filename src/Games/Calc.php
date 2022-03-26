<?php

namespace Brain\Games\Calc;

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

    line("What is the result of the expression?");

    $operators = ["+", "-", "*"];
    $lastIndex = count($operators) - 1;

    for ($i = 1; $i <= getNumberRounds(); $i++) {
        $randomOperator = $operators[rand(0, $lastIndex)];
        [$firstNumber, $secondNumber] = getRandomNumbers(2, 0, 10);

        $correctAnswer = 0;
        switch ($randomOperator) {
            case "+":
                $correctAnswer = $firstNumber + $secondNumber;
                break;
            case "-":
                $correctAnswer = $firstNumber - $secondNumber;
                break;
            case "*":
                $correctAnswer = $firstNumber * $secondNumber;
                break;
        }

        $playerAnswer = getPlayerAnswer("{$firstNumber} {$randomOperator} {$secondNumber}");
        printPlayerAnswerMsg($playerAnswer);

        if (intval($playerAnswer) !== intval($correctAnswer)) {
            printWrongAnswerMsg($playerAnswer, $correctAnswer, $name);
            return;
        }

        printCorrectMsg();
    }

    printCongratulationMsg($name);
}
