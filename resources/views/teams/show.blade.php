@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <h1>{{ $team->name }}</h1>
            <h2>Players</h2>
            <ul class="list-group">
            @foreach($team->users as $user)
                    <li class="list-group-item">
                        <a href="/users/{{ $user->id }}">{{ $user->nickname }}</a>
                    </li>
                @endforeach
            </ul>

            <h2>Scrims</h2>
            @if ($user->team_id == $team->id)
                <a href="/scrims/add">Add a new scrim opportunity</a>
            @endif
            <ul class="list-group">
                @foreach($team->scrims as $scrim)
                    <li class="list-group-item"><a href="/scrims/{{ $scrim->id }}">{{ $scrim->date }} from {{ $scrim->startTime }} until {{ $scrim->endTime }}</a></li>
                @endforeach
            </ul>

            <h3><a href="/teams">Back to all teams</a></h3>
            <h5><a href="/">Back to hub</a></h5>
        </div>
    </div>
@stop