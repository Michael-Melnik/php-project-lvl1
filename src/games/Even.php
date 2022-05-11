<?php

namespace Brain\Games\Even;

use Brain\Games\core;

use function cli\line;
use function cli\prompt;

function gameIsEven(): void
{
    core\runGame(game(core\QUESTION_COUNT));
}


function game(int $questionCount): array
{
    $task = 'Answer "yes" if the number is even, otherwise answer "no".';
    $questions = [];
    for ($i = 0; $i < $questionCount; $i++) {
        $randomNumber = rand(1, 1000);
        $answer = $randomNumber % 2 === 0 ? 'yes' : 'no';
        $question = "{$randomNumber}";
        $questions[] = [$question, $answer];
    }
    return [$task, $questions];
}
