@extends('layouts.main')


@section('style')
    {!!Html::style('css/bootstrap-table.css')!!}
@stop
@section('content')

    @include('layouts.elements.title')
    <div class="row">
        <div class="col-lg-12">
            <a type="button" class="btn btn-success" href="{{url($_SERVER['REQUEST_URI'] . '/create')}}">
                <i class="glyphicon glyphicon glyphicon-plus icon-list-alt"></i> {{ ucfirst(trans('helper.add')) . ' ' . $title }}
            </a>
            <br>
            <br>
            @include('layouts.elements.advancedtable')
        </div>
    </div>

@stop

@section('script')

    {!! Html::script('js/bootstrap-table.js') !!}

@stop