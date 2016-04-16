@extends('layouts.main')


@section('style')
    {!!Html::style('css/bootstrap-table.css')!!}
@stop
@section('content')

    @include('layouts.elements.title')
    <div class="row">
        <div class="col-lg-12">
            @include('layouts.elements.advancedtable')
        </div>
    </div>

@stop

@section('script')

    {!! Html::script('js/bootstrap-table.js') !!}

@stop