<?php

namespace Brain\Games\Games\Calc;

use function Brain\Games\Engine\run;

const GAME_DESCRIPTION = 'What is the result of the expression?';

const MIN_NUM = 0;
const MAX_NUM = 10;
const OPERATORS = ['+', '-', '*'];

function startGame()
{
    run(GAME_DESCRIPTION, function () {
        $randOperator = OPERATORS[array_rand(OPERATORS)];
        $firstRandNum = rand(MIN_NUM, MAX_NUM);
        $secondRandNum = rand(MIN_NUM, MAX_NUM);
        $question = "{$firstRandNum} {$randOperator} {$secondRandNum}";

        $correctAnswer = 0;
        switch ($randOperator) {
            case '+':
                $correctAnswer = $firstRandNum + $secondRandNum;
                break;
            case '-':
                $correctAnswer = $firstRandNum - $secondRandNum;
                break;
            case '*':
                $correctAnswer = $firstRandNum * $secondRandNum;
                break;
            default:
                throw new \Error("Unknown operator '{$randOperator}'!");
        }

        return [$question, $correctAnswer];
    });
}
