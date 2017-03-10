@extends('layouts.app')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <input type="hidden" class="kanbanId" data-id="{{$kanban->id}}">
                    <div class="panel-heading" style="text-align: center">
                        {{$kanban->title}}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#addUser">Inviter des gens</button>
            </div>
        </div>
    </div>
    <section class="kanban">
        <article class="col-md-3 col-sm-6 col-xs-12" style="background-color: #888c89; color:white; text-align: center; min-height: 100vh;">
            <h2>
                To Do
            </h2>
            <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModalCreation1" style="margin-bottom: 10px;">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
            <hr>
            @foreach($tasks as $task)
                @if($task->state_id === 1)
                    <div class="task" data-toggle="modal" data-target="#myModal{{ $task->id }}">
                        <h3>{{ $task->title }}</h3>
                        <hr>
                        <p class="task_description">
                            {{ str_limit($task->description,150) }}
                        </p>
                    </div>
                @endif
            @endforeach
        </article>
        <article class="col-md-3 col-sm-6 col-xs-12" style="background-color: #5fb4e2; color:white; text-align: center; min-height: 100vh;">
            <h2>
                In Progress
            </h2>
            <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModalCreation2" style="margin-bottom: 10px;">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
            <hr>
            @foreach($tasks as $task)
                @if($task->state_id === 2)
                    <div class="task" data-toggle="modal" data-target="#myModal{{ $task->id }}">
                        <h3>{{ $task->title }}</h3>
                        <hr>
                        <p class="task_description">
                            {{ str_limit($task->description,150) }}
                        </p>
                    </div>
                @endif
            @endforeach
        </article>
        <article class="col-md-3 col-sm-6 col-xs-12" style="background-color: #8c4100; color:white; text-align: center; min-height: 100vh;">
            <h2>
                To Review
            </h2>
            <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModalCreation3" style="margin-bottom: 10px;">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
            <hr>
            @foreach($tasks as $task)
                @if($task->state_id === 3)
                    <div class="task" data-toggle="modal" data-target="#myModal{{ $task->id }}">
                        <h3>{{ $task->title }}</h3>
                        <hr>
                        <p class="task_description">
                            {{ str_limit($task->description,150) }}
                        </p>
                    </div>
                @endif
            @endforeach
        </article>
        <article class="col-md-3 col-sm-6 col-xs-12" style="background-color: #49811e; color:white; text-align: center; min-height: 100vh;">
            <h2>
                Done
            </h2>
            <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModalCreation4" style="margin-bottom: 10px;">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
            <hr>
            @foreach($tasks as $task)
                @if($task->state_id === 4)
                    <div class="task" data-toggle="modal" data-target="#myModal{{ $task->id }}">
                        <h3>{{ $task->title }}</h3>
                        <hr>
                        <p class="task_description">
                            {{ str_limit($task->description,150) }}
                        </p>
                    </div>
                @endif
            @endforeach
        </article>
    </section>
@endsection

@for ($i = 1; $i < 5; $i++)
    <div class="modal fade" id="myModalCreation{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {!! Form::open(['url' => 'kanban/'.Request::segment(2).'/add']) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Entrez les informations de votre tâche</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title-name" class="control-label">Nom de la tache :</label>
                        <input type="text" class="form-control" id="title-name" name="title">
                    </div>
                    <div class="form-group">
                        <label for="description-text" class="control-label">Description :</label>
                        <textarea class="form-control" id="description-text" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="description-text" class="control-label">Etat de la tache :</label>
                        {!! Form::select('state', ['1' => 'To Do', '2' => 'In Progress', '3' => 'To Review', '4' => 'Done'], $i) !!}
                    </div>
                    <div class="form-group">
                        <label for="description-text" class="control-label">Qui s'en charge :</label>
                        <select name="userId">
                            <option value="">À définir</option>
                            @foreach($usersIn as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endfor

<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Liste des autres utilisateurs :</h4>
            </div>
            <div class="modal-body">
                @foreach($usersNotIn as $user)
                    <div class="user" data-id="{{$user->id}}">{{$user->name}}</div>
                @endforeach
            </div>
        </div>
    </div>
</div>


@foreach($tasks as $task)
    <div class="modal fade" id="myModal{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {!! Form::open(['url' => 'kanban/'.Request::segment(2).'/add']) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Entrez les informations de votre tâche</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title-name" class="control-label">Nom de la tache :</label>
                        <input type="text" class="form-control" id="title-name" name="title" value="{{ $task->title }}">
                    </div>
                    <div class="form-group">
                        <label for="description-text" class="control-label">Description :</label>
                        <textarea class="form-control" id="description-text" name="description">{{ $task->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="description-text" class="control-label">Etat de la tache :</label>
                        {!! Form::select('state', ['1' => 'To Do', '2' => 'In Progress', '3' => 'To Review', '4' => 'Done'], $task->state_id) !!}
                    </div>
                    <div class="form-group">
                        <label for="description-text" class="control-label">Qui s'en charge :</label>
                        <select name="userId">
                            <option value="">À définir</option>
                            @foreach($usersIn as $user)
                                <option value="{{$user->id}}" @if($task->user_id == $user->id) selected @endif>{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="task_id" value="{{ $task->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endforeach