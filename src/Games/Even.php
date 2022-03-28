<?php

namespace Brain\Games\Even;

use function cli\line;
use function Brain\Games\Engine\{getPlayerName, getPlayerAnswer, getNumberRounds};
use function Brain\Games\Engine\{printWelcomeMsg, printGreetingMsg, printPlayerAnswerMsg};
use function Brain\Games\Engine\{printCongratulationMsg, printWrongAnswerMsg, printCorrectMsg};
use function Brain\Games\Engine\{getRandomNumbers};

function startGame()
{
    printWelcomeMsg();
    $name = getPlayerName();
    printGreetingMsg($name);

    line("Answer \"yes\" if the number is even, otherwise answer \"no\".");

    for ($round = 1; $round <= getNumberRounds(); $round++) {
        [$randNum] = getRandomNumbers(1);
        $correctAnswer = $randNum % 2 === 0 ? "yes" : "no";

        $question = "{$randNum}";
        $playerAnswer = getPlayerAnswer($question);
        printPlayerAnswerMsg($playerAnswer);

        if (strval($playerAnswer) !== strval($correctAnswer)) {
            printWrongAnswerMsg($playerAnswer, $correctAnswer, $name);
            return;
        }

        printCorrectMsg();
    }

    printCongratulationMsg($name);
}
