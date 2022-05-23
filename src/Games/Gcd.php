<?php

namespace Brain\Games\Gcd;

use function Brain\Games\Engine\runGame;

use const Brain\Games\Engine\ROUND_COUNT;

const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function startGameGcd(): void
{
    $questionsAndAnswer = [];
    for ($i = 0; $i < ROUND_COUNT; $i++) {
        $randomNumber1 = rand(1, 20);
        $randomNumber2 = rand(1, 20);
        $question = "{$randomNumber1} {$randomNumber2}";
        $answer = (string) getGreatestCommonDivisor($randomNumber1, $randomNumber2);
        $questionsAndAnswer[] = ['question' => $question, 'answer' => $answer];
    }
    runGame(GAME_DESCRIPTION, $questionsAndAnswer);
}

function getGreatestCommonDivisor(int $num1, int $num2): int
{
    if ($num1 == 0 || $num2 == 0) {
        return max($num1, $num2);
    }
    while ($num1 != $num2) {
        $num1 > $num2 ? $num1 -= $num2 : $num2 -= $num1;
    }
    return $num1;
}
