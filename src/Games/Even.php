<?php

namespace Brain\Games\Even;

use function cli\line;
use function Brain\Games\Engine\getPlayerName;
use function Brain\Games\Engine\getPlayerAnswer;
use function Brain\Games\Engine\getNumberRounds;
use function Brain\Games\Engine\printWelcomeMsg;
use function Brain\Games\Engine\printGreetingMsg;
use function Brain\Games\Engine\printPlayerAnswerMsg;
use function Brain\Games\Engine\printCongratulationMsg;
use function Brain\Games\Engine\printWrongAnswerMsg;
use function Brain\Games\Engine\printCorrectMsg;

function startGame()
{
    printWelcomeMsg();
    $name = getPlayerName();
    printGreetingMsg($name);

    line("Answer \"yes\" if the number is even, otherwise answer \"no\".");

    define("MIN_NUMBER", 1);
    define("MAX_NUMBER", 100);

    for ($i = 1; $i <= getNumberRounds(); $i++) {
        $randomNumber = rand(MIN_NUMBER, MAX_NUMBER);
        $correctAnswer = $randomNumber % 2 === 0 ? "yes" : "no";

        $playerAnswer = getPlayerAnswer($randomNumber);
        printPlayerAnswerMsg($playerAnswer);

        if (strval($playerAnswer) !== strval($correctAnswer)) {
            printWrongAnswerMsg($playerAnswer, $correctAnswer, $name);
            return;
        }

        printCorrectMsg();
    }

    printCongratulationMsg($name);
}