<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\LeagueRepositoryContract;
use App\Contracts\Repositories\TeamRepositoryContract;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{

    public function __construct(
        private readonly TeamRepositoryContract $teamRepository,
        private readonly LeagueRepositoryContract $leagueRepository
    ){}

    public function index(): Factory|View|Application
    {
        return view('home', [
            'leagues' => $this->leagueRepository->all(),
            'teams' => $this->teamRepository->all()
        ]);
    }
}
