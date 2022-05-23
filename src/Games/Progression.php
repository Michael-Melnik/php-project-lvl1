<?php

namespace Brain\Games\Progression;

use function Brain\Games\Engine\runGame;

use const Brain\Games\Engine\ROUND_COUNT;

const GAME_DESCRIPTION = 'What number is missing in the progression?';

function startProgressionGame(): void
{
    $questionsAndAnswer = [];
    for ($i = 0; $i < ROUND_COUNT; $i++) {
        $randomNumber = rand(1, 20);
        [$question, $answer] = createProgression($randomNumber);
        $questionsAndAnswer[] = ['question' => $question, 'answer' => $answer];
    }
    runGame(GAME_DESCRIPTION, $questionsAndAnswer);
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
