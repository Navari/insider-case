@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            @foreach($leagues as $league)
                @include('league.info-card', $league)
            @endforeach
        </div>
    </div>
@endsection
