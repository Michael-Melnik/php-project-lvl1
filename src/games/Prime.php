<?php

namespace Brain\Games\Prime;

use Brain\Games\Engine;

function primeGame(): void
{
    Engine\runGame(game(Engine\QUESTION_COUNT));
}


function game(int $questionCount): array
{
    $task = 'Answer "yes" if given number is prime. Otherwise answer "no".';
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
    $flag = true;
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i === 0) {
            $flag = false;
            break;
        }
    }
    return $flag;
}
