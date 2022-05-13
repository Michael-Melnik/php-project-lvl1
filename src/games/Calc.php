<?php

namespace Brain\Games\Calc;

use Brain\Games\Engine;

function gameCalc(): void
{
    Engine\runGame(game(Engine\QUESTION_COUNT));
}


function game(int $questionCount): array
{
    $task = 'What is the result of the expression?';
    $questions = [];
    $operations = ['+','-','*'];
    $answer = 0;
    for ($i = 0; $i < $questionCount; $i++) {
        $randomNumber1 = rand(1, 10);
        $randomNumber2 = rand(1, 10);
        $operation = $operations[rand(0, 2)];
        switch ($operation) {
            case '+':
                $answer = (string)($randomNumber1 + $randomNumber2);
                break;
            case '-':
                $answer = (string)($randomNumber1 - $randomNumber2);
                break;
            case '*':
                $answer = (string)($randomNumber1 * $randomNumber2);
                break;
        }
        $question = "{$randomNumber1} {$operation} {$randomNumber2}";
        $questions[] = [$question, $answer];
    }
    return [$task, $questions];
}
