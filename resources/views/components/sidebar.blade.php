<nav class="page-sidebar" data-pages="sidebar">
    <!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->
    <div class="sidebar-overlay-slide from-top" id="appMenu">
    </div>
    <!-- END SIDEBAR MENU TOP TRAY CONTENT-->
    <!-- BEGIN SIDEBAR MENU HEADER-->
    <div class="sidebar-header">
        <img src="{{url('assets/img/logo_white.png')}}" alt="logo" class="brand"
             data-src="{{url('assets/img/logo_white.png')}}"
             data-src-retina="assets/img/logo_white_2x.png" width="78" height="22">
        <div class="sidebar-header-controls">
            <button aria-label="Toggle Drawer" type="button"
                    class="btn btn-icon-link invert sidebar-slide-toggle m-l-20 m-r-10" data-pages-toggle="#appMenu">
                <i class="pg-icon">chevron_down</i>
            </button>
            <button aria-label="Pin Menu" type="button"
                    class="btn btn-icon-link invert d-lg-inline-block d-xlg-inline-block d-md-inline-block d-sm-none d-none"
                    data-toggle-pin="sidebar">
                <i class="pg-icon"></i>
            </button>
        </div>
    </div>
    <!-- END SIDEBAR MENU HEADER-->
    <!-- START SIDEBAR MENU -->
    <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">

            @foreach (config('app.sidebar') as $item)
                <li @if($loop->iteration ==1)
                    class="m-t-30"
                    @endif >
                    <a href="{{route($item['route'])}}">
                        <span class="title">{{$item['name']}}</span>
                    </a>
                    <span class="icon-thumbnail ">
                            <a href="{{isset($item['create_route']) ? route($item['create_route']) : '#'}}"><i
                                    class="pg-icon">{{$item['logo']}}</i>
                            </a></span>

                </li>
            @endforeach
        </ul>
        <div class="clearfix"></div>
    </div>
    <!-- END SIDEBAR MENU -->
</nav>
