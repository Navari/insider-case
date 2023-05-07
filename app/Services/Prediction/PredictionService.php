<?php

namespace App\Services\Prediction;

use App\Models\League;
use App\Models\LeagueTeamStanding;

class PredictionService
{
    /**
     * @var League
     */
    private League $league;

    /**
     * @var int
     */
    private int $remainedPoints;

    /**
     * @var int
     */
    private int $topTeamPoint;

    /**
     * @var array
     */
    private array $prediction = [];


    /**
     * @return array
     */
    public function getPrediction(): array
    {
        if ($this->checkIfPredictionIsNeeded()) {
            return [];
        }

        //get top team current point and number of week remained for each team
        $this->remainedPoints = LeagueTeamStanding::WON_POINT * ($this->league->total_week - $this->league->played_week);
        $this->topTeamPoint = $this->league->standing->first()->points;

        foreach ($this->league->teams as $team) {
            $this->prediction[$team->logo] = $this->calculateTeamChance($team, $team->strength);
        }

        $this->calculateChanceInPercentage();

        return $this->prediction;
    }

    private function checkIfPredictionIsNeeded(): bool
    {
        return (
            $this->league->played_week === 0
            || $this->league->played_week === $this->league->total_week
        );
    }

    private function calculateTeamChance($team, $strength): float|int
    {
        /** @var LeagueTeamStanding $teamStanding */
        $teamStanding = $team->standing()->where('league_id', $this->league->id)->first();

        if ($this->remainedPoints + $teamStanding->points < $this->topTeamPoint) {
            return 0;
        }

        $chance = 0;
        $matches = $team->leagueMatches($this->league->id);

        foreach ($matches as $match) {
            if ($match->home_team == $team->id) {
                $chance += 2;
            }

            if ($match->away_team == $team->id) {
                $chance += 1;
            }
        }

        $chance = $chance * $strength - (($this->topTeamPoint - $teamStanding->points) / 2);

        return max($chance, 0);
    }

    private function calculateChanceInPercentage(): void
    {
        $rawPrediction = $this->prediction;
        $this->prediction = [];

        $onePointPercent = 100 / array_sum($rawPrediction);

        foreach ($rawPrediction as $team => $teamChance) {
            $this->prediction[] = [
                'logo' => $team,
                'rate' => round($teamChance * $onePointPercent, 2)
            ];
        }

        $keys = array_column($this->prediction, 'rate');
        array_multisort($keys, SORT_DESC, $this->prediction);
    }

    public function setLeague(League $league): self
    {
        $this->league = $league;

        return $this;
    }
}
