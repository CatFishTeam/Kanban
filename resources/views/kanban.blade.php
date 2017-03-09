@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Kanbans
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::select('size', ['TD' => 'To Do', 'IP' => 'In Progress', 'TR' => 'To Review', 'D' => 'Done'], 'TD'); !!}
    {!! Form::submit('Cette action sera irréparable en cas d\'échec, votre vie sera en péril.   ' ); !!}
    <section class="kanban">
        <article class="col-md-3 col-sm-6 col-xs-12" style="background-color: #8c8c8c; color:white; text-align: center; height: 100vh;">
            <h2>
                To Do
            </h2>
            <hr>
        </article>
        <article class="col-md-3 col-sm-6 col-xs-12" style="background-color: #00b5e2; color:white; text-align: center; height: 100vh;">
            <h2>
                In Progress
            </h2>
            <hr>
        </article>
        <article class="col-md-3 col-sm-6 col-xs-12" style="background-color: #8c3310; color:white; text-align: center; height: 100vh;">
            <h2>
                To Review
            </h2>
            <hr>
        </article>
        <article class="col-md-3 col-sm-6 col-xs-12" style="background-color: #408140; color:white; text-align: center; height: 100vh;">
            <h2>
                Done
            </h2>
            <hr>
        </article>
    </section>
@endsection

