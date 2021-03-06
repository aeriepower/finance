@extends('layouts.main')


@section('style')
    {!!Html::style('css/bootstrap-table.css')!!}
@stop
@section('content')

    @include('layouts.elements.title')
    <div class="row">
        <div class="col-lg-12">
            <div class="col-md-6">
                {!! Form::open(array('action' => 'TransactionController@store', 'method' => 'POST', 'files' => true)) !!}
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
                <div class="form-group">
                    {!! Form::label('category', trans('form.transaction-category')) !!}
                    {!! Form::select('category', array(), null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('file', trans('form.transaction-category')) !!}
                    {!! Form::file('file', ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit(trans('form.transaction-save'),['class' => 'form-control btn-info']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@stop

@section('script')
@stop

