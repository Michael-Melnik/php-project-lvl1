<?php

namespace Brain\Games\Prime;

use function Brain\Games\Engine\runGame;

use const Brain\Games\Engine\ROUND_COUNT;

const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function startPrimeGame(): void
{
    $questionsAndAnswer = [];
    for ($i = 0; $i < ROUND_COUNT; $i++) {
        $randomNumber = rand(1, 100);
        $question = $randomNumber;
        $answer = isPrimeNumber($randomNumber) ? 'yes' : 'no';
        $questionsAndAnswer[] = ['question' => $question, 'answer' => $answer];
    }
    runGame(GAME_DESCRIPTION, $questionsAndAnswer);
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
