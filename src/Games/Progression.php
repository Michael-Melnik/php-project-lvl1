<?php

namespace Brain\Games\Progression;

use function Brain\Games\Engine\runGame;

use const Brain\Games\Engine\QUESTION_COUNT;

const GAME_DESCRIPTION = 'What number is missing in the progression?';

function startProgressionGame(): void
{
    runGame(createGameRules(QUESTION_COUNT, GAME_DESCRIPTION));
}

function createGameRules(int $questionCount, string $task): array
{
    $questions = [];
    for ($i = 0; $i < $questionCount; $i++) {
        $randomNumber = rand(1, 20);
        [$question, $answer] = createProgression($randomNumber);
        $questions[] = [$question, $answer];
    }
    return [$task, $questions];
}

function createProgression(int $startNum): array
{
    $progression = [];
    $step = rand(2, 4);
    $randNumber = rand(0, 9);
    $answer = null;
    for ($i = 0; $i < 10; $i++) {
        if ($i === $randNumber) {
            $progression[] = '..';
            $answer = $startNum + $step * $i;
        } else {
            $progression[] = $startNum + $step * $i;
        }
    }
    return [implode(' ', $progression), (string)$answer];
}
