<?php

namespace Brain\Games\Games\Even;

use function Brain\Games\Engine\run;

const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

const MIN_NUM = 1;
const MAX_NUM = 100;

function startGame()
{
    run(GAME_DESCRIPTION, function () {
        $randNum = rand(MIN_NUM, MAX_NUM);
        $question = "{$randNum}";
        $correctAnswer = $randNum % 2 === 0 ? 'yes' : 'no';

        return [$question, $correctAnswer];
    });
}
