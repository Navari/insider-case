<?php

namespace App\Repositories;

use App\Contracts\Repositories\LeagueMatchRepositoryContract;
use App\Models\LeagueMatch;
use Illuminate\Support\Collection;

class LeagueMatchRepository extends BaseRepository implements LeagueMatchRepositoryContract
{
    /**
     * @param LeagueMatch $leagueMatch
     */
    public function __construct(LeagueMatch $leagueMatch)
    {
        parent::__construct($leagueMatch);
    }

    public function getNotStartedMatchByLeagueAndWeek(int $leagueId, ?int $week): Collection
    {
        $query = $this->model
            ->where('league_id', $leagueId)
            ->where('status', false);

        if (!is_null($week)) {
            $query->where('week', $week);
        }

        return $query->get();
    }
}
