@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <h1>{{ $scrim->team->name }} wants to scrim</h1>
            @if($opponent->id != 0)
                <h3>
                    Current opponent: {{ $opponent->name }}
                </h3>
            @endif

            <ul class="list-group">
                <li class="list-group-item">On {{ $scrim->date }}</li>
                <li class="list-group-item">From {{ $scrim->startTime }}</li>
                <li class="list-group-item">To {{ $scrim->endTime }}</li>
            </ul>
            <br>
            <hr>
            <br>
            <ul class="list-group">
                @foreach($scrim->comments as $comment)
                    <li class="list-group-item"
                        @if($comment->chosen == true)
                                style="background-color: lightgreen"
                        @endif
                            ><span style="font-weight: bold">
                            <a href="/users/{{ $comment->user->id }}">{{ $comment->user->team->abbreviation }}.{{ $comment->user->nickname }}</a></span>: {{ $comment->body }}
                        @if ($user->team_id == $comment->scrim->team_id)
                            <a href="/scrims/{{ $scrim->id }}/choose/{{ $comment->id }}" class="pull-right">
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                            </a>
                        @endif
                    </li>
                @endforeach
            </ul>
            @if($user->team_id)
                <form method="post" action="/scrims/{{ $scrim->id }}/comment">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="scrim_id" value="{{ $scrim->id }}">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <div class="form-group">
                        <label for="body">Comment</label>
                        <input type="text" name="body" class="form-control"><br>
                        <button type="submit" name="submit" class="btn btn-primary">Add comment</button>
                    </div>
                </form>
            @endif
            <br>
            <hr>
            <br>
            <h3><a href="/scrims">Back to all scrims</a></h3>
            <h5><a href="/">Back to hub</a></h5>
        </div>
    </div>
@stop