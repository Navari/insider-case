<?php

namespace App\Http\Controllers\League;

use App\Contracts\Constants;
use App\Contracts\Repositories\TeamRepositoryContract;
use App\Enums\LeagueEnum;
use App\Http\Controllers\Controller;
use App\Models\League;
use App\Services\Fixture\FixtureService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StartLeagueController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param League $league
     * @param TeamRepositoryContract $teamRepository
     * @param FixtureService $fixtureService
     * @return RedirectResponse
     */
    public function __invoke(
        Request $request,
        League $league,
        TeamRepositoryContract $teamRepository,
        FixtureService $fixtureService
    ): RedirectResponse
    {
        if ($league->status != LeagueEnum::NOT_STARTED) {
            return redirect()->route('home')->with('session-alert', [
                'class' => Constants::DANGER_CLASS,
                'alert' => 'this league is already started'
            ]);
        }

        $teams = $teamRepository->all();
        $teamCount = rand(2, round(($teams->count()/ 2), 0, PHP_ROUND_HALF_DOWN)) * 2;

        $teams = $teams->shuffle()->slice(0, $teamCount);

        $fixtureService
            ->setLeague($league)
            ->setTeams($teams)
            ->build();

        $league->update(['status' => LeagueEnum::STARTED]);

        return redirect()->route('league.show', $league);
    }
}
