<?php

namespace Brain\Games\Even;

use Brain\Games\Engine;

const TASK = 'Answer "yes" if the number is even, otherwise answer "no".';

function gameIsEven(): void
{
    Engine\runGame(CreateGameRules(Engine\QUESTION_COUNT, TASK));
}

function createGameRules(int $questionCount, string $task): array
{
    $questions = [];
    for ($i = 0; $i < $questionCount; $i++) {
        $randomNumber = rand(1, 1000);
        $answer = $randomNumber % 2 === 0 ? 'yes' : 'no';
        $question = "{$randomNumber}";
        $questions[] = [$question, $answer];
    }
    return [$task, $questions];
}
