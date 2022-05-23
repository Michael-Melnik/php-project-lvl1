<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const ROUND_COUNT = 3;

function runGame(string $gameDescription, array $questionsAndAnswers): void
{
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?', '', ' ');
    line("Hello, %s!", $userName);
    line($gameDescription);
    foreach ($questionsAndAnswers as $task) {
        line("Question: %s", $task['question']);
        $userAnswer = prompt('Your answer');
        if ($userAnswer === $task['answer']) {
            line('Correct!');
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $userAnswer, $task['answer']);
            line("Let's try again, %s!", $userName);
            return;
        }
    }
    line("Congratulations, %s!", $userName);
}
