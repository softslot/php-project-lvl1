<?php

namespace Brain\Games\Progression;

use function Brain\Games\Engine\gameplay;

function startGame()
{
    $title = "What number is missing in the progression?";

    gameplay($title, function () {
        $progression = [];
        $length = rand(5, 10);
        $step = rand(1, 10);
        $start = rand(1, 100);

        for ($i = 0; $i < $length; $i++) {
            if (count($progression) === 0) {
                $progression[] = $start;
            } else {
                $progression[] = $progression[$i - 1] + $step;
            }
        }

        $randKey = array_rand($progression, 1);
        $correctAnswer = $progression[$randKey];
        $progression[$randKey] = "..";

        $question = implode(" ", $progression);

        return [$question, $correctAnswer];
    });
}
