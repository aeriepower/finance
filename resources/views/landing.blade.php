<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="img/favicon.png">
    <title>Lumino - Dashboard</title>

    {!! Html::script('js/jquery-1.11.1.min.js') !!}

    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/styles.css')!!}
    {!!Html::style('https://necolas.github.io/normalize.css/4.1.1/normalize.css')!!}
    {!!Html::style('css/jquery.pagepiling.css')!!}
    {!!Html::style('css/landing.css')!!}

            <!--Icons-->
    {!! Html::script('js/lumino.glyphs.js') !!}
        {!! Html::script('js/jquery.pagepiling.js') !!}

        <!--[if lt IE 9]>
    {!! Html::script('js/html5shiv.js') !!}
    {!! Html::script('js/respond.min.js') !!}
    <![endif]-->
</head>
<body>
<header>
    @include('layouts.topbar')
</header>

<div id="content">

    <section class="welcome section">
        <h1>Toma el control de tu $capital</h1>
        <h2>< / title ></h2>
    </section>

    <section class="tips section">
        <div class="box odd" id="dashboard">1</div>
        <div class="box even">
            <h3>dashboard</h3>
            <p>{{ trans('landingPage.lorem') }}</p>
        </div>
        <div class="box odd">
            <h3>planning</h3>
            <p>{{ trans('landingPage.lorem') }}</p>
        </div>
        <div class="box even" id="planning">4</div>
    </section>

    <section class="responsive section">

    </section>

</div>

<script>
    $('#content').pagepiling();
</script>
</body>
</html>
