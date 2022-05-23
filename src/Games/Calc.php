<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\runGame;

use const Brain\Games\Engine\ROUND_COUNT;

const GAME_DESCRIPTION = 'What is the result of the expression?';

function startCalcGame(): void
{
    $questionsAndAnswer = [];
    $operations = ['+','-','*'];
//    $answer = 0;
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
    $result = 0;
    switch ($operation) {
        case '+':
            $result = $num1 + $num2;
            break;
        case '-':
            $result = $num1 - $num2;
            break;
        case '*':
            $result = $num1 * $num2;
            break;
    }
    return $result;
}
