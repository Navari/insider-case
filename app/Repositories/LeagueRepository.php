<?php

namespace App\Repositories;

use App\Contracts\Repositories\LeagueRepositoryContract;
use App\Models\League;

class LeagueRepository extends BaseRepository implements LeagueRepositoryContract
{
    /**
     * @param League $league
     */
    public function __construct(League $league)
    {
       parent::__construct($league);
    }
}
