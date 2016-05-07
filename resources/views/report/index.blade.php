@extends('layouts.main')

@section('content')

    @include('layouts.elements.title')
    <div class="row">
        @foreach($data['panels'] as $panel)
        <div class="col-lg-3 col-md-6 col-sm-6">
            @include('layouts.elements.basicpanel', ['panelInfo' => $panel])
        </div>
        @endforeach
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
                        <canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop
@section('script')

    <script>

        var data = {
            labels: {!! $data['charts']['accountBalance']['label'] !!},
            datasets: [
                {
                    label: "Account Balance",
                    pointColor: '#24CBE5',
                    borderColor: '#24CBE5',
                    backgroundColor: 'rgba(36,203,229,0.05)',
                    borderDash: [8, 8],
                    data: {!! $data['charts']['accountBalance']['line1'] !!}
                }
            ]

        }
        var myLineChart = new Chart($('#line-chart'), {
            type: 'line',
            data: data,
            options: {
                onClick: function (event) {
                    eventElement = myLineChart.getElementAtEvent(event);
                    if (eventElement[0] != undefined) {
                        index = eventElement[0]['_index'];
                        window.location.href = 'transacciones/fecha/' + mylabels[index];
                    }
                },
                responsive: true,
                tooltips: {
                    mode: 'label',
                },
            },
        });
    </script>
    {!! Html::script('js/bootstrap-table.js') !!}
    {!! Html::script('js/jquery-ui.min.js') !!}
@endsection