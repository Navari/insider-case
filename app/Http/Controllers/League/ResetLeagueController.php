<?php

namespace App\Http\Controllers\League;

use App\Http\Controllers\Controller;
use App\Models\League;
use App\Services\League\LeagueService;
use Illuminate\Http\RedirectResponse;

class ResetLeagueController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param League $league
     * @return RedirectResponse
     */
    public function __invoke(League $league): RedirectResponse
    {
        LeagueService::reset($league);

        return redirect()->route('league.show', $league);
    }
}
