@extends('layouts.app')

@section('content')
<div class="container">
    <dvi class="row">
        <div class="col-xs-12 col-sm-8">
            <h2>Tâches en cours</h2>
            @foreach($tasks as $task)
                {{$task}}
            @endforeach
        </div>
        <div class="col-xs-12 col-sm-4">
            <h2>Mes Kanban</h2>
            @foreach($kanbans as $kanban)
                {{$kanban}}
            @endforeach
        </div>
    </dvi>
</div>
@endsection
