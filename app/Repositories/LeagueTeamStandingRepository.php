<?php

namespace App\Repositories;

use App\Contracts\Repositories\LeagueTeamStandingRepositoryContract;
use App\Models\LeagueTeamStanding;

class LeagueTeamStandingRepository extends BaseRepository implements LeagueTeamStandingRepositoryContract
{
    /**
     * @param LeagueTeamStanding $leagueTeamStanding
     */
    public function __construct(LeagueTeamStanding $leagueTeamStanding)
    {
       parent::__construct($leagueTeamStanding);
    }
}
