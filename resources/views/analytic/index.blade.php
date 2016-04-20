@extends('layouts.main')


@section('style')
    {!!Html::style('css/bootstrap-table.css')!!}
    {!!Html::style('css/jquery-ui.css')!!}
    {!!Html::style('css/jquery-ui.theme.min.css')!!}
@stop
@section('content')
    @include('layouts.elements.title')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-4">Monthly cashflow overview</div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            {!! Form::open(array('action' => 'AnalyticController@index', 'method' => 'POST')) !!}
                            {!! Form::token() !!}
                            <div class="row">
                                <div class="col-md-4">
                                    {!! Form::text('dateFrom',null,['class' => 'form-control', 'id' => 'dateFrom','placeholder' => trans('form.login-email')]) !!}
                                </div>
                                <div class="col-md-4">
                                    {!! Form::text('dateTo',null,['class' => 'form-control', 'id' => 'dateTo','placeholder' => trans('form.login-email')]) !!}
                                </div>
                                <div class="col-md-4">
                                    {!! Form::submit(trans('form.login-save'),['class' => 'form-control btn-info']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="canvas-wrapper">
                        <canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        //$('#dateFrom').datepicker("dateFormat", "yy/mm/dd" );
        //$('#dateTo').datepicker( "dateFormat", "yy/mm/dd" );
        $("#dateFrom").datepicker({
            dateFormat: "yy-mm-dd"
        });
        $("#dateTo").datepicker({
            dateFormat: "yy-mm-dd"
        });
        var randomScalingFactor = function () {
            return Math.round(Math.random() * 1000)
        };

        var dummy = {
            labels: {!! $labels !!},
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: {!! $line1 !!}
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(48, 164, 255, 0.2)",
                    strokeColor: "rgba(48, 164, 255, 1)",
                    pointColor: "rgba(48, 164, 255, 1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(48, 164, 255, 1)",
                    data: {!! $line2 !!}
                }
            ]

        }

        window.onload = function () {
            var chart1 = document.getElementById("line-chart").getContext("2d");
            window.myLine = new Chart(chart1).Line(dummy, {
                responsive: true
            });
        };
    </script>

    {!! Html::script('js/bootstrap-table.js') !!}
    {!! Html::script('js/jquery-ui.js') !!}

@stop