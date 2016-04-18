<?php
ini_set('xdebug.max_nesting_level', 3000);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lumino - Dashboard</title>

    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/datepicker3.css')!!}
    {!!Html::style('css/styles.css')!!}

    <!--Icons--><script src=""></script>
    {!! Html::script('js/lumino.glyphs.js') !!}

    <!--[if lt IE 9]>
    {!! Html::script('js/html5shiv.js') !!}
    {!! Html::script('js/respond.min.js') !!}
    <![endif]-->

    @yield('style')

</head>

<body>

@include('layouts.topbar')
@include('layouts.sidebar')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    @if(count($errors) > 0)
        @foreach($errors->all() as $msg)
            @include('layouts.elements.alert')
        @endforeach
    @endif

    @yield('content')

</div>

{!! Html::script('js/jquery-1.11.1.min.js') !!}
{!! Html::script('js/bootstrap.min.js') !!}
{!! Html::script('js/chart.min.js') !!}
{!! Html::script('js/chart-data.js') !!}
{!! Html::script('js/easypiechart.js') !!}
{!! Html::script('js/easypiechart-data.js') !!}
{!! Html::script('js/bootstrap-datepicker.js') !!}

@yield('script'
)
</body>

</html>
