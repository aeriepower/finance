
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
                <a href="{{ URL::to($key) }}">
                    <svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>
                    {{ ucfirst($value) }}
                </a>
            </li>
        @endforeach
        {{--
        <li class="parent ">
        <a href="#">
        <span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> {{ trans('sidebar.dropdown') }}
        </a>
        <ul class="children collapse" id="sub-item-1">
        <li>
        <a class="" href="#">
        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> {{ trans('sidebar.subitem') }}
        </a>
        </li>
        <li>
        <a class="" href="#">
        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> {{ trans('sidebar.subitem') }}
        </a>
        </li>
        <li>
        <a class="" href="#">
        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> {{ trans('sidebar.subitem') }}
        </a>
        </li>
        </ul>
        </li>
        <li role="presentation" class="divider"></li>
        <li><a href="login.html"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> {{ trans('sidebar.login') }}</a></li>
        --}}
    </ul>
</div><!--/.sidebar-->