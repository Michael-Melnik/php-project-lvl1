<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const QUESTION_COUNT = 3;

function runGame(array $game): void
{
    [$task, $questions] = $game;
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?', false, ' ');
    line("Hello, %s!", $userName);
    line($task);
    foreach ($questions as $item) {
        [$question, $answer] = $item;
        line("Question: %s", $question);
        $userAnswer = prompt('Your answer');
        if ($userAnswer === $answer) {
            line('Correct!');
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $userAnswer, $answer);
            line("Let`s try again, %s!", $userName);
            exit();
        }
    }
    line("Congratulations, %s!", $userName);
}
