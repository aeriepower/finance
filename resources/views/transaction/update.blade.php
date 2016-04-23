@extends('layouts.main')


@section('style')
    {!!Html::style('css/bootstrap-table.css')!!}
@stop
@section('content')

    @include('layouts.elements.title')
    {!! Form::model($transaction,['route' => ['transactions.update', $transaction->id], 'method' => 'PUT']) !!}
    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-orange panel-widget ">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <svg class="glyph stroked calendar">
                            <use xlink:href="#stroked-bag"></use>
                        </svg>
                    </div>
                    <div class="col-sm-9 col-lg-7 widget-right">
                        {!! Form::text('amount',$transaction->amount,['class' => 'form-control large',
                        'placeholder' => trans('form.transaction-data')]) !!}
                        <div class="text-muted">Importe</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-teal panel-widget ">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-5 widget-left">
                        <svg class="glyph stroked calendar">
                            <use xlink:href="#stroked-notepad"></use>
                        </svg>
                    </div>
                    <div class="col-sm-9 col-lg-7 widget-right" style="padding-top: 4px;">
                        {!! Form::text('concept',$transaction->concept,['class' => 'form-control',
                        'placeholder' => trans('form.transaction-concept'),
                        'style' => 'margin-bottom:4px;']) !!}
                        {!! Form::text('data',$transaction->data,['class' => 'form-control',
                        'placeholder' => trans('form.transaction-data')]) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            {!! Form::token() !!}


                    <!-- Start todolist-->
            <div class="panel panel-blue">
                <div class="panel-heading dark-overlay">
                    <svg class="glyph stroked clipboard-with-paper">
                        <use xlink:href="#stroked-clipboard-with-paper"></use>
                    </svg>
                    Category
                </div>
                <div class="panel-body">
                    <ul class="todo-list">
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{!! $category->id !!}"
                                    @if($transaction->category_id == $category->id)
                                        selected
                                    @endif
                                >
                                    {!! $category->name_es !!}
                                </option>
                            @endforeach
                        </select>
                    </ul>
                </div>
            </div>
            <!-- End todolist -->

            {!! Form::submit(trans('form.transaction-save'),['class' => 'form-control btn-info']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('script')
@stop

