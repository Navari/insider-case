<?php

namespace App\Http\Controllers\League;

use App\Http\Controllers\Controller;
use App\Models\League;
use App\Services\Simulation\SimulationService;
use Illuminate\Http\RedirectResponse;

class SimulationLeagueController extends Controller
{
    public function __invoke(
        SimulationService $simulationService,
        League            $league,
        ?int              $week = null
    ): RedirectResponse
    {
        $simulationService
            ->setLeague($league)
            ->setWeek($week)
            ->simulate();

        return redirect()->route('league.show', $league);
    }
}
