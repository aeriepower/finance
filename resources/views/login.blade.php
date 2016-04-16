<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forms</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
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
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->



<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>
