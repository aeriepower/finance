@extends('layouts.main')


@section('style')
    {!!Html::style('css/bootstrap-table.css')!!}
@stop
@section('content')

    @include('layouts.elements.title')
    {!! Form::model($transaction,['route' => ['transactions.update', $transaction->id], 'method' => 'PUT']) !!}
    {!! Form::token() !!}
    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-orange panel-widget ">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-3 widget-left">
                        <svg class="glyph stroked calendar">
                            <use xlink:href="#stroked-bag"></use>
                        </svg>
                    </div>
                    <div class="col-sm-9 col-lg-9 widget-right">
                        {!! Form::text('amount',$transaction->amount,['class' => 'form-control large',
                        'placeholder' => trans('form.transaction-data')]) !!}
                        <div class="text-muted">{!! Date('Y-m-d',strtotime($transaction->datetime)) !!}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-3">
            <div class="panel panel-teal panel-widget ">
                <div class="row no-padding">
                    <div class="col-sm-3 col-lg-3 widget-left">
                        <svg class="glyph stroked calendar">
                            <use xlink:href="#stroked-notepad"></use>
                        </svg>
                    </div>
                    <div class="col-sm-9 col-lg-9 widget-right" style="padding-top: 4px;">
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
                            @foreach($categories as $category => $subCategories)
                                <optgroup label="{!! $category !!}">
                                    @foreach($subCategories as $subCategory)
                                        <option
                                            @if($transaction->category_id == $subCategory['id'])
                                                selected
                                            @endif
                                        value="{!! $subCategory['id'] !!}">{!! $subCategory['name_es'] !!}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p>Is this pay an <b>exception</b>?</p>
                    <input type="radio" class="lumio-radio" name="exception" id="exception-1" value="1"
                           @if($transaction->exception == 1) checked @endif
                    >
                    <label for="exception-1" class="bg-teal">yes</label>
                    <input type="radio" class="lumio-radio" name="exception" id="exception-2" value="0"
                           @if($transaction->exception == 0) checked @endif
                    >
                    <label for="exception-2" class="bg-red">no</label>
                </div>
                <div class="col-md-6">
                    <p>Is this transaction an <b>reiterative</b> billing?</p>
                    <input type="radio" class="lumio-radio" name="reiterate" id="reiterate-1" value="1"
                           @if($transaction->reiterate == 1) checked @endif
                    >
                    <label for="reiterate-1" class="bg-teal">yes</label>
                    <input type="radio" class="lumio-radio" name="reiterate" id="reiterate-2" value="0"
                           @if($transaction->reiterate == 0) checked @endif
                    >
                    <label for="reiterate-2" class="bg-red">no</label>
                </div>
            </div>
            <br>
            {!! Form::submit(trans('form.transaction-save'),['class' => 'form-control btn-info']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('script')
@stop

