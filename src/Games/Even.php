<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\runGame;

use const Brain\Games\Engine\QUESTION_COUNT;

const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function startGameIsEven(): void
{
    runGame(createGameRules(QUESTION_COUNT, GAME_DESCRIPTION));
}

function createGameRules(int $questionCount, string $task): array
{
    $questions = [];
    for ($i = 0; $i < $questionCount; $i++) {
        $randomNumber = rand(1, 1000);
        $answer = isEven($randomNumber) ? 'yes' : 'no';
        $question = "{$randomNumber}";
        $questions[] = [$question, $answer];
    }
    return [$task, $questions];
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
