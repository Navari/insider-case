<?php

namespace App\Repositories;

use App\Contracts\Repositories\TeamRepositoryContract;
use App\Models\Team;

class TeamRepository extends BaseRepository implements TeamRepositoryContract
{
    /**
     * @param Team $team
     */
    public function __construct(Team $team)
    {
       parent::__construct($team);
    }
}
