<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\gameplay;

function startGame()
{
    $title = "Answer \"yes\" if the number is even, otherwise answer \"no\".";

    gameplay($title, function () {
        $randNum = rand(1, 100);
        $question = "{$randNum}";
        $correctAnswer = $randNum % 2 === 0 ? "yes" : "no";

        return [$question, $correctAnswer];
    });
}
