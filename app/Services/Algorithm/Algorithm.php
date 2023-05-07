<?php

namespace App\Services\Algorithm;

class Algorithm
{
    /**
     * @param array $teamsInRound
     * @return array
     */
    public static function run(array $teamsInRound): array
    {
        $teamsCount = count($teamsInRound);

        if ($teamsCount === 0) {
            throw new \InvalidArgumentException('RoundRobinSchedulerAlgorithm expects an array of at least 1 team');
        }
        if ($teamsCount % 2 == 1) {
            $teamsInRound[] = NULL;
            $teamsCount++;
        }
        if ($teamsCount === 2) {
            return [
                [$teamsInRound[0], $teamsInRound[1]],
            ];
        }

        $gamesCount = $teamsCount - 1;

        $home = [];
        $away = [];

        for ($i = 0; $i < $teamsCount / 2; $i++) {
            $home[$i] = $teamsInRound[$i];
            $away[$i] = $teamsInRound[$teamsCount - 1 - $i];
        }

        $firstHalfCalendar = [];
        for ($i = 0; $i < $gamesCount; $i++) {
            if (($i % 2) == 0) {
                for ($j = 0; $j < $teamsCount / 2; $j++) {
                    $firstHalfCalendar[$i][] = [$away[$j], $home[$j]];
                }
            } else {
                for ($j = 0; $j < $teamsCount / 2; $j++) {
                    $firstHalfCalendar[$i][] = [$home[$j], $away[$j]];
                }
            }

            $pivot = $home[0];
            array_unshift($away, $home[1]);
            $carryover = array_pop($away);
            array_shift($home);
            $home[] = $carryover;
            $home[0] = $pivot;
        }

        return self::secondHalf($firstHalfCalendar);
    }

    /**
     * @param array $firstHalfCalendar
     * @return array
     */
    public static function secondHalf(array $firstHalfCalendar): array
    {
        $secondHalfCalendar = [];

        foreach ($firstHalfCalendar as $weekKey => $weeks) {
            foreach ($weeks as $match => $week) {
                $secondHalfCalendar[$weekKey][$match] = [
                    $week[1],
                    $week[0],
                ];
            }
        }

        return array_merge($firstHalfCalendar, $secondHalfCalendar);
    }
}
