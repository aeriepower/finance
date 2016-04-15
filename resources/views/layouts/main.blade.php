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

</head>

<body>

@include('layouts.topbar')
@include('layouts.sidebar')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    @yield('content')

</div>

{!! Html::script('js/jquery-1.11.1.min.js') !!}
{!! Html::script('js/bootstrap.min.js') !!}
{!! Html::script('js/chart.min.js') !!}
{!! Html::script('js/chart-data.js') !!}
{!! Html::script('js/easypiechart.js') !!}
{!! Html::script('js/easypiechart-data.js') !!}
{!! Html::script('js/bootstrap-datepicker.js') !!}

<script>
    $('#calendar').datepicker({});

    !function ($) {
        $(document).on("click", "ul.nav li.parent > a > span.icon", function () {
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
</script>
</body>

</html>
