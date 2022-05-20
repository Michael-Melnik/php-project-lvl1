<?php

namespace Brain\Games\Calc;

use function Brain\Games\Engine\runGame;

use const Brain\Games\Engine\QUESTION_COUNT;

const GAME_DESCRIPTION = 'What is the result of the expression?';

function startCalcGame(): void
{
    runGame(createGameRules(QUESTION_COUNT, GAME_DESCRIPTION));
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
