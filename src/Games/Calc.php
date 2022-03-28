<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\gameplay;

function startGame()
{
    $title = "What is the result of the expression?";

    gameplay($title, function () {
        $operators = ["+", "-", "*"];
        $lastIndex = count($operators) - 1;
        $randOperator = $operators[rand(0, $lastIndex)];
        $firstRandNum = rand(0, 10);
        $secondRandNum = rand(0, 10);
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
