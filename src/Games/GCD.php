<?php

namespace Brain\Games\GCD;

use function Brain\Games\Engine\gameplay;

function startGame()
{
    $title = "Find the greatest common divisor of given numbers.";

    gameplay($title, function () {
        $secondRandNum = rand(1, 100);
        $firstRandNum = rand(1, 100);
        $smallNum = $firstRandNum < $secondRandNum ? $firstRandNum : $secondRandNum;
        $question = "{$firstRandNum} {$secondRandNum}";

        $correctAnswer = 0;
        for ($divisor = 1; $divisor <= $smallNum; $divisor++) {
            if ($firstRandNum % $divisor === 0 && $secondRandNum % $divisor === 0) {
                $correctAnswer = $divisor;
            }
        }

        return [$question, $correctAnswer];
    });
}
