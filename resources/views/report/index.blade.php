@extends('layouts.main')

@section('content')

    @include('layouts.elements.breadcrumb')

    @include('layouts.elements.title')
    <div class="row">
        @include('layouts.elements.highlight')

        @include('layouts.elements.highlight')

        @include('layouts.elements.highlight')

        @include('layouts.elements.highlight')
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Site Traffic Overview</div>
                <div class="panel-body">
                    <div class="canvas-wrapper">
                        <canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->

    <div class="row">
        @include('layouts.elements.roundchart')

        @include('layouts.elements.roundchart')

        @include('layouts.elements.roundchart')

        @include('layouts.elements.roundchart')
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-8">

            @include('layouts.elements.chat')

        </div><!--/.col-->

        <div class="col-md-4">

            @include('layouts.elements.todolist')

        </div><!--/.col-->
    </div><!--/.row-->

@stop