<?php

namespace Brain\Games\Gcd;

use Brain\Games\Engine;

function gameGcd(): void
{
    Engine\runGame(game(Engine\QUESTION_COUNT));
}


function game(int $questionCount): array
{
    $task = 'Find the greatest common divisor of given numbers.';
    $questions = [];
    for ($i = 0; $i < $questionCount; $i++) {
        $randomNumber1 = rand(1, 20);
        $randomNumber2 = rand(1, 20);
        $question = "{$randomNumber1} {$randomNumber2}";
        $answer = (string) greatestCommonDivisor($randomNumber1, $randomNumber2);
        $questions[] = [$question, $answer];
    }
    return [$task, $questions];
}

function greatestCommonDivisor(int $num1, int $num2): int
{
    if ($num1 == 0 || $num2 == 0) {
        return max($num1, $num2);
    }
    $r = $num1 % $num2;
    return $r != 0 ? greatestCommonDivisor($num2, $r) : $num2;
}
