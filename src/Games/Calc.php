<?php

namespace Brain\Games\Calc;

use Brain\Games\Engine;

const TASK = 'What is the result of the expression?';

function gameCalc(): void
{
    Engine\runGame(createGameRules(Engine\QUESTION_COUNT, TASK));
}

function createGameRules(int $questionCount, string $task): array
{
    $questions = [];
    $operations = ['+','-','*'];
    $answer = 0;
    for ($i = 0; $i < $questionCount; $i++) {
        $randomNumber1 = rand(1, 10);
        $randomNumber2 = rand(1, 10);
        $operation = $operations[rand(0, 2)];
        $answer = (string) calculate($operation, $randomNumber1, $randomNumber2);
        $question = "{$randomNumber1} {$operation} {$randomNumber2}";
        $questions[] = [$question, $answer];
    }
    return [$task, $questions];
}

function calculate(string $operation, int $num1, int $num2)
{
    switch ($operation) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
    }
}
