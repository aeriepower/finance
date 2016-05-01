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
                </div>
            </div>

        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-4">Billing per category</div>
                    </div>
                </div>


                <div class="panel-body">
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

        line1 = {!! $line1 !!} ;
        line2 = {!! $line2 !!} ;
        mylabels = {!! $labels !!};
        var data = {
            labels: mylabels,
            datasets: [
                {
                    label: "Ingresos",
                    pointColor: '#24CBE5',
                    borderColor: '#24CBE5',
                    backgroundColor: 'rgba(36,203,229,0.05)',
                    borderDash: [8, 8],
                    data: line1
                },
                {
                    label: "Gastos",
                    pointColor: '#FF9655',
                    borderColor: '#FF9655',
                    backgroundColor: 'rgba(255,150,85,0.05)',
                    data: line2
                }
            ]

        }

        var labels = [
            "Compras",
            "Ocio y transporte",
            "Vivienda y vehículo",
            "Salud, saber y deporte",
            "Servicios típicos",
            "Seguros",
            "Bancos y organismos",
            "Gastos varios",
        ];

        var colors = [
            '#058DC7',
            '#50B432',
            '#ED561B',
            '#DDDF00',
            '#24CBE5',
            '#64E572',
            '#FF9655',
            '#6AF9C4',
        ];

        var data2 = {
            labels: {!! $cumulativeBillingByCategory['labels'] !!},

            datasets: [
                    @for ($i = 1; $i <= count($cumulativeBillingByCategory['lines']); $i++)
                {
                    label: labels[{{ $i-1 }}],
                    pointColor: colors[{{ $i }}],
                    borderColor: colors[{{ $i }}],
                    backgroundColor: 'rgba(0,0,0,0)',
                    data: {{ $cumulativeBillingByCategory['lines']['line' . $i] }}
                },
                @endfor

            ],
            colours: [{
                fillColor: 'rgba(47, 132, 71, 0.8)',
                strokeColor: 'rgba(47, 132, 71, 0.8)',
                highlightFill: 'rgba(47, 132, 71, 0.8)',
                highlightStroke: 'rgba(47, 132, 71, 0.8)'
            }]

        }


        var myLineChart = new Chart($('#line-chart'), {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                onClick: function (event) {
                    manolo = myLineChart.getElementAtEvent(event);
                    index = manolo[0]['_index'];
                    console.log(mylabels[index]);
                    {{--window.location.href = {{url(trans('routes.transactionByDate'))}};--}}
                },
                tooltips: {
                    mode: 'label',
                },
                hover: {
                    mode: 'dataset'
                },
            },
        });
        var myLineChart2 = new Chart($('#line-chart2'), {
            type: 'line',
            data: data2,
            options: {
                responsive: true,
                tooltips: {
                    mode: 'label',
                },
                hover: {
                    mode: 'dataset'
                },
            }
        });



    </script>

    {!! Html::script('js/bootstrap-table.js') !!}
    {!! Html::script('js/jquery-ui.min.js') !!}

@stop