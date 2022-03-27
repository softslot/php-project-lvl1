<?php

namespace Brain\Games\Progression;

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

    line("What number is missing in the progression?");

    for ($round = 1; $round <= getNumberRounds(); $round++) {
        $progression = [];
        [$progressionLength] = getRandomNumbers(1, 5, 10);
        [$progressionStep] = getRandomNumbers(1, 1, 10);
        [$progressionStart] = getRandomNumbers(1, 1, 100);

        for ($i = 0; $i < $progressionLength; $i++) {
            if (count($progression) === 0) {
                $progression[] = $progressionStart;
            } else {
                $progression[] = $progression[$i - 1] + $progressionStep;
            }
        }

        $randomKey = array_rand($progression, 1);
        $correctAnswer = $progression[$randomKey];
        $progression[$randomKey] = "..";

        $question = implode(" ", $progression);
        $playerAnswer = getPlayerAnswer($question);
        printPlayerAnswerMsg($playerAnswer);

        if (intval($playerAnswer) !== intval($correctAnswer)) {
            printWrongAnswerMsg($playerAnswer, $correctAnswer, $name);
            return;
        }

        printCorrectMsg();
    }

    printCongratulationMsg($name);
}
