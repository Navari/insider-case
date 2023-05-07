<?php

namespace App\Providers;

use App\Contracts\Repositories\LeagueMatchRepositoryContract;
use App\Contracts\Repositories\LeagueRepositoryContract;
use App\Contracts\Repositories\LeagueTeamStandingRepositoryContract;
use App\Contracts\Repositories\TeamRepositoryContract;
use App\Contracts\Repositories\UserRepositoryContract;
use App\Repositories\LeagueMatchRepository;
use App\Repositories\LeagueRepository;
use App\Repositories\LeagueTeamStandingRepository;
use App\Repositories\TeamRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       $this->bindRepositories();
    }

    /**
     * bind Repositories.
     *
     * @return void
     */
    private function bindRepositories()
    {
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
        $this->app->bind(TeamRepositoryContract::class, TeamRepository::class);
        $this->app->bind(LeagueRepositoryContract::class, LeagueRepository::class);
        $this->app->bind(LeagueTeamStandingRepositoryContract::class, LeagueTeamStandingRepository::class);
        $this->app->bind(LeagueMatchRepositoryContract::class, LeagueMatchRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
