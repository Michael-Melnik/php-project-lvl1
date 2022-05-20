<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\runGame;

use const Brain\Games\Engine\QUESTION_COUNT;

const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function startPrimeGame(): void
{
    runGame(createGameRules(QUESTION_COUNT, GAME_DESCRIPTION));
}

function createGameRules(int $questionCount, string $task): array
{
    $questions = [];
    for ($i = 0; $i < $questionCount; $i++) {
        $randomNumber = rand(1, 100);
        $question = $randomNumber;
        $answer = isPrimeNumber($randomNumber) ? 'yes' : 'no';
        $questions[] = [$question, $answer];
    }
    return [$task, $questions];
}

function isPrimeNumber(int $num): bool
{
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}
