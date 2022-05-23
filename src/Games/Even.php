<?php

namespace Brain\Games\Even;

use function Brain\Games\Engine\runGame;

use const Brain\Games\Engine\ROUND_COUNT;

const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function startGameIsEven(): void
{
    $questionsAndAnswer = [];
    for ($i = 0; $i < ROUND_COUNT; $i++) {
        $randomNumber = rand(1, 1000);
        $answer = isEven($randomNumber) ? 'yes' : 'no';
        $question = "{$randomNumber}";
        $questionsAndAnswer[] = ['question' => $question, 'answer' => $answer];
    }
    runGame(GAME_DESCRIPTION, $questionsAndAnswer);
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
