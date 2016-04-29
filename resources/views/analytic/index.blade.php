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
                        <div class="col-md-4">Cumulative cashflow overview</div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            {!! Form::open(array('action' => 'AnalyticController@index', 'method' => 'POST')) !!}
                            {!! Form::token() !!}
                            <div class="row">
                                <div class="col-md-4">
                                    {!! Form::text('dateFrom',$date['From'],['class' => 'form-control', 'id' => 'dateFrom' ]) !!}
                                </div>
                                <div class="col-md-4">
                                    {!! Form::text('dateTo',$date['To'],['class' => 'form-control', 'id' => 'dateTo' ]) !!}
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
                    <div class="canvas-wrapper">
                        <canvas class="main-chart" id="line-chart2" height="200" width="600"></canvas>
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

        var data = {
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
                    data: {{ $line1 }}
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(50,204,236, 0.3)",
                    strokeColor: "rgba(50,204,236, 1)",
                    pointColor: "rgba(50,204,236, 1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(48, 164, 255, 1)",
                    data: {{ $line2 }}
                }
            ]

        }
        var data2 = {
            labels: {!! $cumulativeBillingByCategory['labels'] !!},
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "rgba(5,141,199,0.05)",
                    strokeColor: "#058DC7",
                    pointColor: "#058DC7",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: {{ $cumulativeBillingByCategory['line1'] }}
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(80,180,50,0.05)",
                    strokeColor: "#50B432",
                    pointColor: "#50B432",
                    pointHighlightStroke: "rgba(48, 164, 255, 1)",
                    data: {{ $cumulativeBillingByCategory['line2'] }}
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(237,86,27,0.05)",
                    strokeColor: "#ED561B",
                    pointColor: "#ED561B",
                    pointHighlightStroke: "rgba(48, 164, 255, 1)",
                    data: {{ $cumulativeBillingByCategory['line3'] }}
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(221,223,0,0.05)",
                    strokeColor: "#DDDF00",
                    pointColor: "#DDDF00",
                    pointHighlightStroke: "rgba(48, 164, 255, 1)",
                    data: {{ $cumulativeBillingByCategory['line4'] }}
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(36,203,229,0.05)",
                    strokeColor: "#24CBE5",
                    pointColor: "#24CBE5",
                    pointHighlightStroke: "rgba(48, 164, 255, 1)",
                    data: {{ $cumulativeBillingByCategory['line5'] }}
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(100,229,114,0.05)",
                    strokeColor: "#64E572",
                    pointColor: "#64E572",
                    pointHighlightStroke: "rgba(48, 164, 255, 1)",
                    data: {{ $cumulativeBillingByCategory['line6'] }}
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(255,150,85,0.05)",
                    strokeColor: "#FF9655",
                    pointColor: "#FF9655",
                    pointHighlightStroke: "rgba(48, 164, 255, 1)",
                    data: {{ $cumulativeBillingByCategory['line7'] }}
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(106,249,196,0.05)",
                    strokeColor: "#6AF9C4",
                    pointColor: "#6AF9C4",
                    pointHighlightStroke: "rgba(48, 164, 255, 1)",
                    data: {{ $cumulativeBillingByCategory['line8'] }}
                }
            ]

        }

        window.onload = function () {
            var chart1 = document.getElementById("line-chart").getContext("2d");
            window.myLine = new Chart(chart1).Line(data, {
                responsive: true
            });
            var chart2 = document.getElementById("line-chart2").getContext("2d");
            window.myLine = new Chart(chart2).Line(data2, {
                responsive: true
            });
        };
    </script>

    {!! Html::script('js/bootstrap-table.js') !!}
    {!! Html::script('js/jquery-ui.js') !!}

@stop