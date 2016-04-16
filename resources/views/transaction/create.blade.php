@extends('layouts.main')


@section('style')
    {!!Html::style('css/bootstrap-table.css')!!}
@stop
@section('content')

    @include('layouts.elements.title')
    <div class="row">
        <div class="col-lg-12">
            {!! Form::close() !!}
            <div class="col-md-6">
                {!! Form::open(array('action' => 'TransactionController@create', 'method' => 'POST')) !!}
                <div class="form-group">
                    {!! Form::token() !!}
                    {!! Form::label('concept', trans('form.transaction-concept')) !!}
                    {!! Form::text('concept',null,['class' => 'form-control', 'placeholder' => trans('form.transaction-concept')]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('data', trans('form.transaction-data')) !!}
                    {!! Form::text('data',null,['class' => 'form-control', 'placeholder' => trans('form.transaction-data')]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('amount', trans('form.transaction-amount')) !!}
                    {!! Form::number('amount',null,['class' => 'form-control', 'placeholder' => trans('form.transaction-amount')]) !!}
                </div>
                {!! Form::select('category', array('1' => 1),['class' => 'form-control']) !!}
            </div>
        </div>
    </div>

@stop

@section('script')
@stop

