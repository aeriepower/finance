<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="img/favicon.png">
    <title>Lumino - Dashboard</title>

    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/datepicker3.css')!!}
    {!!Html::style('css/styles.css')!!}
    {!!Html::style('https://necolas.github.io/normalize.css/4.1.1/normalize.css')!!}
    {!!Html::style('//fonts.googleapis.com/css?family=Cabin%3A400%2C600%7COpen+Sans%3A400%2C300%2C600')!!}
    {!!Html::style('css/landing.css')!!}

            <!--Icons-->
    {!! Html::script('js/lumino.glyphs.js') !!}
        {!! Html::script('js/jquery-1.11.1.min.js') !!}
        {!! Html::script('js/parallax.min.js') !!}

        <!--[if lt IE 9]>
    {!! Html::script('js/html5shiv.js') !!}
    {!! Html::script('js/respond.min.js') !!}
    <![endif]-->
    <style>
        .fake {
            height: 1000px;
        }
    </style>
</head>
<body>
<header>
    @include('layouts.topbar')
</header>

<section>
    <div class="row">
        <article class="welcome">
            <div class="shadow"></div>
            <div class="welcome-parallax">
                <h1>Toma el control de tu $capital</h1>
                <h2> < / SubTitle ></h2>
                <button><a href="/{{ trans('routes.login') }}">Empezar</a></button>
            </div>
        </article>
    </div>
</section>

<section class="tips">
    <div class="row">
        <article class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
            <img src="https://cdn1.iconfinder.com/data/icons/business-and-finance-20/200/vector_65_14-128.png"
                 alt="Charts">
            <h3>Lorem</h3>
            <p>{{ trans('landingPage.lorem') }}</p>
        </article>
        <article class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
            <img src="https://cdn1.iconfinder.com/data/icons/business-and-finance-20/200/vector_65_04-128.png"
                 alt="Money">
            <h3>Lorem</h3>
            <p>{{ trans('landingPage.lorem') }}</p>
        </article>
        <article class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
            <img src="https://cdn1.iconfinder.com/data/icons/business-and-finance-20/200/vector_65_07-128.png"
                 alt="Save">
            <h3>Lorem</h3>
            <p>{{ trans('landingPage.lorem') }}</p>
        </article>
    </div>
</section>

<section class="responsive">
    <article class="display">
        <div class="display-content" data-z-index="2">

        </div>
    </article>
    <article class="laptop">
        <div class="laptop-content" data-z-index="1">

        </div>
    </article>
    <article class="tablet">
        <div class="tablet-content" data-z-index="3">

        </div>
    </article>
    <article class="movil">
        <div class="movil-content" data-z-index="4">

        </div>
    </article>
</section>

<div class="fake"></div>
<script>
    $('.welcome-parallax').parallax({
        imageSrc: 'img/landing/welcome-background.jpg'
    });
    $('.display-content').parallax({
        imageSrc: 'img/landing/responsive/report.jpg',
        naturalWidth: 435,
        naturalHeight: 260,
        iosFix: true,
        overScrollFix: true,
        positionX: '0'
    });
    $('.laptop-content').parallax({
        imageSrc: 'img/landing/responsive/report.jpg',
        naturalWidth: 367,
        naturalHeight: 230,
        iosFix: true,
        overScrollFix: true,
        positionX: '0'
    });
    $('.tablet-content').parallax({
        imageSrc: 'img/landing/responsive/report.jpg',
        naturalWidth: 253,
        naturalHeight: 174,
        iosFix: true,
        overScrollFix: true,
        positionX: '-100'
    });
    $('.movil-content').parallax({
        imageSrc: 'img/landing/responsive/report.jpg',
        naturalWidth: 84,
        naturalHeight: 149,
        iosFix: true,
        overScrollFix: true,
        positionX: '0'
    });
</script>
</body>
</html>
