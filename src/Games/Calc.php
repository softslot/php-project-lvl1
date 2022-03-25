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

function startGame()
{
    printWelcomeMsg();
    $name = getPlayerName();
    printGreetingMsg($name);

    line("What is the result of the expression?");

    define("MIN_NUMBER", 0);
    define("MAX_NUMBER", 10);
    $operators = ["+", "-", "*"];
    $lastIndex = count($operators) - 1;

    for ($i = 1; $i <= getNumberRounds(); $i++) {
        $randomOperator = $operators[rand(0, $lastIndex)];
        $firstRandomNumber = rand(MIN_NUMBER, MAX_NUMBER);
        $secondRandomNumber = rand(MIN_NUMBER, MAX_NUMBER);

        $correctAnswer = 0;
        switch ($randomOperator) {
            case "+":
                $correctAnswer = $firstRandomNumber + $secondRandomNumber;
                break;
            case "-":
                $correctAnswer = $firstRandomNumber - $secondRandomNumber;
                break;
            case "*":
                $correctAnswer = $firstRandomNumber * $secondRandomNumber;
                break;
        }

        $playerAnswer = getPlayerAnswer("{$firstRandomNumber} {$randomOperator} {$secondRandomNumber}");
        printPlayerAnswerMsg($playerAnswer);

        if (intval($playerAnswer) !== intval($correctAnswer)) {
            printWrongAnswerMsg($playerAnswer, $correctAnswer, $name);
            return;
        }

        printCorrectMsg();
    }

    printCongratulationMsg($name);
}
