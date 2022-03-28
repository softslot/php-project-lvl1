<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\run;

const MIN_NUM = 0;
const MAX_NUM = 10;
const OPERATORS = ["+", "-", "*"];

function startGame()
{
    $title = "What is the result of the expression?";

    run($title, function () {
        $lastIndex = count(OPERATORS) - 1;
        $randOperator = OPERATORS[rand(0, $lastIndex)];
        $firstRandNum = rand(MIN_NUM, MAX_NUM);
        $secondRandNum = rand(MIN_NUM, MAX_NUM);
        $question = "{$firstRandNum} {$randOperator} {$secondRandNum}";

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

        return [$question, $correctAnswer];
    });
}
