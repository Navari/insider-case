@extends('layouts.app')
@section('content')
    <div class="container ">
        <div class="row mb-4">
            <h2 class="standings-box_title">{{ $league->name  }}</h2>
            <div class="col-md-8">
                @include('standing.table', $league)
            </div>
            <div class="col-md-4">
                @include('league.info-card', ['league' => $league, 'header' => false, 'class' => ''])
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h3>Matches</h3>
                @foreach($league->leagueMatches->groupBy('week') as $week)
                    @include('league.week.week-card', $week)
                @endforeach
            </div>
            <div class="col-md-3">
                @if(!($league->played_week === 0 || $league->played_week == $league->total_week))
                    @include('league.prediction', $predictions)
                @endif
            </div>
        </div>
    </div>
@endsection
