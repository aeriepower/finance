@extends('layouts.main')


@section('style')
    {!!Html::style('css/bootstrap-table.css')!!}
@stop
@section('content')

    @include('layouts.elements.title')
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
    </div>
    <div class="row">
        <div class="col-lg-12">
            <a type="button" class="btn btn-success" href="{{url($_SERVER['REQUEST_URI'] . '/create')}}">
                <i class="glyphicon glyphicon glyphicon-plus icon-list-alt"></i> {{ ucfirst(trans('helper.add')) . ' ' . $title }}
            </a>
            <br>
            <br>
            @include('layouts.elements.advancedtable')
        </div>
    </div>

@stop

@section('script')
    <script>

        var randomScalingFactor = function(){ return Math.round(Math.random()*1000)};

        var dummy = {
            labels : {!! $labels !!},
            datasets : [
                {
                    label: "My First dataset",
                    fillColor : "rgba(220,220,220,0.2)",
                    strokeColor : "rgba(220,220,220,1)",
                    pointColor : "rgba(220,220,220,1)",
                    pointStrokeColor : "#fff",
                    pointHighlightFill : "#fff",
                    pointHighlightStroke : "rgba(220,220,220,1)",
                    data : {!! $line1 !!}
                },
                {
                    label: "My Second dataset",
                    fillColor : "rgba(48, 164, 255, 0.2)",
                    strokeColor : "rgba(48, 164, 255, 1)",
                    pointColor : "rgba(48, 164, 255, 1)",
                    pointStrokeColor : "#fff",
                    pointHighlightFill : "#fff",
                    pointHighlightStroke : "rgba(48, 164, 255, 1)",
                    data : {!! $line2 !!}
                }
            ]

        }

        window.onload = function(){
            var chart1 = document.getElementById("line-chart").getContext("2d");
            window.myLine = new Chart(chart1).Line(dummy, {
                responsive: true
            });
        };
    </script>

    {!! Html::script('js/bootstrap-table.js') !!}

@stop