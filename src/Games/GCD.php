<?php

namespace Brain\Games\Games\GCD;

use function Brain\Games\Engine\run;

const GAME_DESCRIPTION = "Find the greatest common divisor of given numbers.";

const MIN_NUM = 1;
const MAX_NUM = 100;

function startGame()
{
    run(GAME_DESCRIPTION, function () {
        $secondRandNum = rand(MIN_NUM, MAX_NUM);
        $firstRandNum = rand(MIN_NUM, MAX_NUM);
        $smallest = $firstRandNum < $secondRandNum ? $firstRandNum : $secondRandNum;

        $question = "{$firstRandNum} {$secondRandNum}";

        $correctAnswer = 0;
        for ($divisor = 1; $divisor <= $smallest; $divisor++) {
            if ($firstRandNum % $divisor === 0 && $secondRandNum % $divisor === 0) {
                $correctAnswer = $divisor;
            }
        }

        return [$question, $correctAnswer];
    });
}
