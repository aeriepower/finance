<div class="col-xs-12 col-md-6 col-lg-3">
    <div class="panel panel-{{ $type }} panel-widget ">
        <div class="row no-padding">
            <div class="col-sm-3 col-lg-5 widget-left">
                <svg class="glyph stroked {{ $icon }}"><use xlink:href="#stroked-bag"></use></svg>
            </div>
            <div class="col-sm-9 col-lg-7 widget-right">
                <input type="text" class="form-control large" value="{{ $value }}" style="border: 0" name="{{ $inputName }}">
                <div class="text-muted">{{ $subtitle }}</div>
            </div>
        </div>
    </div>
</div>
<!--
panel-blue
panel-teal
panel-orange
panel-red
-->