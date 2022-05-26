<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\runGame;

use const Brain\Games\Engine\ROUND_COUNT;

const GAME_DESCRIPTION = 'What is the result of the expression?';

function startCalcGame(): void
{
    $questionsAndAnswer = [];
    $operations = ['+', '-', '*'];
    for ($i = 0; $i < ROUND_COUNT; $i++) {
        $randomNumber1 = rand(1, 10);
        $randomNumber2 = rand(1, 10);
        $operation = $operations[rand(0, 2)];
        $answer = (string) calculate($operation, $randomNumber1, $randomNumber2);
        $question = "{$randomNumber1} {$operation} {$randomNumber2}";
        $questionsAndAnswer[] = ['question' => $question, 'answer' => $answer];
    }
    runGame(GAME_DESCRIPTION, $questionsAndAnswer);
}

function calculate(string $operation, int $num1, int $num2): int
{
    switch ($operation) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
           return $num1 * $num2;
        default:
            throw new \Exception("Unknown operation: {$operation}!");
    }
}
