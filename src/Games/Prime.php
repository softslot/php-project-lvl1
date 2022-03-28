<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\gameplay;

const MIN_NUM = 1;
const MAX_NUM = 100;

function startGame()
{
    $title = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";

    gameplay($title, function () {
        $randNum = rand(MIN_NUM, MAX_NUM);
        $question = "{$randNum}";
        $correctAnswer = isPrime($randNum) ? "yes" : "no";

        return [$question, $correctAnswer];
    });
}

function isPrime(int $num)
{
    if ($num < 2) {
        return false;
    }

    for ($devisor = 2; $devisor <= $num / 2; $devisor++) {
        if ($num % $devisor === 0) {
            return false;
        }
    }

    return true;
}
