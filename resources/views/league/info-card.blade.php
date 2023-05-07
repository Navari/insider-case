<div class="{{ $class ?? 'col-md-4' }}">
    <div class="card bg-dark bg-opacity-50 text-white-50">
        @if($header ?? true)
            <div class="card-header">
                {{ $league->name }}
                <a href="{{route('league.show', $league)}}" class="btn btn-primary float-end pe-auto p-0 px-2">Details</a>
            </div>
        @endif
        <div class="card-body bg-dark bg-opacity-25 text-white-50">
            <ul class="list-group bg-dark bg-opacity-25 text-white-50">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Team Count
                    <span class="badge bg-primary rounded-pill">{{ $league->teams->count() }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Match Count
                    <span class="badge bg-primary rounded-pill">{{ $league->leagueMatches->count() }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Remind Match Count
                    <span class="badge bg-primary rounded-pill">{{ $league->leagueMatches->where('status', 0)->count() }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Remind Week Count
                    <span class="badge bg-primary rounded-pill">{{ $league->total_week - $league->played_week}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Status
                    <span class="badge bg-info rounded-pill">{{ $league->status->value }}</span>
                </li>
            </ul>
            @if(\App\Enums\LeagueEnum::NOT_STARTED === $league->status)
                <div class="d-grid mt-2">
                    <a href="{{ url()->signedRoute('league.start', $league) }}" class="btn btn-primary btn">
                        Start League And Run Fixtures
                    </a>
                    <small class="text-secondary"><sup>*</sup>Team Count Will be Random number (max: team conut)</small>
                </div>
            @endif
            @if(\App\Enums\LeagueEnum::STARTED === $league->status)
                <div class="d-grid mt-2">
                    <a class="btn btn-secondary mt-2 w-100" href="{{ url()->signedRoute('league.simulate', [$league])  }}">
                        Simulate All Weeks
                    </a>
                </div>
            @endif
            @if(\App\Enums\LeagueEnum::NOT_STARTED !== $league->status)
                <div class="d-grid mt-2">
                    <a class="btn btn-danger mt-2 w-100" href="{{ url()->signedRoute('league.reset', [$league])  }}">
                        Reset League
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
