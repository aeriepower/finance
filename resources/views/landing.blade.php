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
        <div class="box odd" id="dashboard"></div>
        <div class="box even">
            <h3>dashboard</h3>
            <p>{{ trans('landingPage.lorem') }}</p>
        </div>
        <div class="box odd">
            <h3>planning</h3>
            <p>{{ trans('landingPage.lorem') }}</p>
        </div>
        <div class="box even" id="planning"></div>
    </section>

    <section class="mobile section">
        <div class="filter">
            <div class="content">
                <h1>Check our mobile App at </h1>
                <img src="img/landing/app-store.jpg" alt="" id="appStore">
                <img src="img/landing/google-play.jpg" alt="" id="googlePlay">
                <img src="img/landing/iphone-filled.png" alt="" id="iphone">
            </div>
        </div>
        <article class="footer"></article>
    </section>

</div>

<script>
    $('#content').pagepiling({
        loopTop: true,
        loopBottom: true,
        scrollingSpeed: 50,
        navigation: {
            'position': 'right',
            'tooltips': ['Welcome', 'Briefing', 'Mobile']
        },
        afterLoad: function(anchorLink, index){
            if(index == 2){
                $('.box').delay(200).animate({
                    width: '50%'
                });
            }
            if(index == 3){
                $('#iphone').delay(1500).animate({
                    top: '50%'
                });
                $('#appStore').delay(100).animate({
                    left: '0%'
                });
                $('#googlePlay').delay(500).animate({
                    left: '0%'
                });
            }
        }
    });
</script>
</body>
</html>
