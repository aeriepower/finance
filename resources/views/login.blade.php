<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="img/favicon.png">
    <title>Forms</title>

    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/styles.css')!!}

    <!--[if lt IE 9]>
    {!! Html::script('js/html5shiv.js') !!}
    {!! Html::script('js/respond.min.js') !!}
    <![endif]-->
</head>

<body>

<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">Log in</div>
            <div class="panel-body">
                {!! Form::open(array('action' => 'LoginController@store', 'method' => 'POST')) !!}
                    {!! Form::token() !!}
                    <div class="form-group">
                        {!! Form::email('email',null,['class' => 'form-control', 'placeholder' => trans('form.login-email')]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::password('password',['class' => 'form-control', 'placeholder' => trans('form.login-password')]) !!}
                    </div>
                    {!! Form::submit(trans('form.login-save'),['class' => 'form-control btn-info']) !!}
                {!! Form::close() !!}
                <br>
                <a href="{{url(trans('routes.createUser'))}}">{{ trans('form.login-create') }}</a>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->

{!! Html::script('js/jquery-1.11.1.min.js') !!}
{!! Html::script('js/bootstrap.min.js') !!}
</body>

</html>
