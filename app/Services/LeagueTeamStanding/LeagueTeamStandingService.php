<?php

namespace App\Services\LeagueTeamStanding;

use App\Contracts\Repositories\LeagueTeamStandingRepositoryContract;
use App\Models\League;
use App\Models\Team;
use Illuminate\Database\Eloquent\Model;

class LeagueTeamStandingService
{


    public function __construct(
        private readonly LeagueTeamStandingRepositoryContract $leagueTeamStandingRepository
    ){}

    /**
     * @param League $league
     * @param Team $team
     * @return Model
     */
    public function createLeagueTeamStanding(League $league, Team $team): Model
    {
        return $this->leagueTeamStandingRepository->create([
            'league_id' => $league->id,
            'team_id' => $team->id,
        ]);
    }
}
