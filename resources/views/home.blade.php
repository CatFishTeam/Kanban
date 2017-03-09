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
                <!-- Button trigger modal -->
                <br>
                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">
                    Ajouter Projet
                </button>

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form method="post" action="">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Entrez les informations de votre projet</h4>
                            </div>
                            <div class="modal-body">
                                    <div class="form-group">
                                        <label for="title-name" class="control-label">Nom du projet :</label>
                                        <input type="text" class="form-control" id="title-name" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="description-text" class="control-label">Description :</label>
                                        <textarea class="form-control" id="description-text" name="description"></textarea>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                <button type="button" class="btn btn-primary" type="submit">Save changes</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </dvi>
    </div>
@endsection
