@extends('layouts.main')

@section('content')

    @include('layouts.elements.title')
    <div class="row">
        @foreach($data['panels'] as $panel)
        <div class="col-lg-3">
            @include('layouts.elements.basicpanel', ['panelInfo' => $panel])
        </div>
        @endforeach
    </div>
    <!--div class="row">
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
    </div-->
@stop