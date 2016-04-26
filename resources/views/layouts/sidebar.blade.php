
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="{{ trans('topbar.search') }}">
        </div>
    </form>
    <ul class="nav menu">
        <?php
            $sidebarElements = trans('sidebar');
        ?>
        @foreach ($sidebarElements as $key => $value)
            <li>
                <a href="{{ URL::to(trans('routes.' . $key)) }}">
                    <svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>
                    {{ ucfirst($value) }}
                </a>
            </li>
        @endforeach
    </ul>
</div><!--/.sidebar-->