<?php

namespace App\Http\Controllers\League;

use App\Contracts\Repositories\LeagueRepositoryContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class StoreLeagueController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param LeagueRepositoryContract $leagueRepository
     * @return RedirectResponse
     */
    public function __invoke(LeagueRepositoryContract $leagueRepository): RedirectResponse
    {
        $league = $leagueRepository->create([
            'name' => 'New League ' . rand(1, 10000)
        ]);

        return redirect()->route('league.show', $league);
    }
}
