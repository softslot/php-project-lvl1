<?php

namespace Brain\Games\Games\Progression;

use function Brain\Games\Engine\run;

const MIN_LENGTH = 5;
const MAX_LENGTH = 10;

const MIN_STEP = 1;
const MAX_STEP = 10;

const MIN_START_NUM = 1;
const MAX_START_NUM = 10;

function startGame()
{
    $title = "What number is missing in the progression?";

    run($title, function () {
        $progression = [];
        $length = rand(MIN_LENGTH, MAX_LENGTH);
        $step = rand(MIN_STEP, MAX_STEP);
        $start = rand(MIN_START_NUM, MAX_START_NUM);

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
