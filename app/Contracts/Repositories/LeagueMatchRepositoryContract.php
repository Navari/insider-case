<?php

namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;

interface LeagueMatchRepositoryContract
{
    /**
     * @param int $leagueId
     * @param int|null $week
     * @return Collection
     */
    public function getNotStartedMatchByLeagueAndWeek(int $leagueId, ?int $week): Collection;
}
