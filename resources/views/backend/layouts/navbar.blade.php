<div class="fixed-navbar">
    <div class="pull-left">
        <button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
        <h1 class="page-title">@yield('nav-title')</h1>
        <!-- /.page-title -->
    </div>
    <!-- /.pull-left -->
    <div class="pull-right">
        <div class="ico-item">
            <a href="#" class="ico-item mdi mdi-magnify js__toggle_open" data-target="#searchform-header"></a>
            <form action="#" id="searchform-header" class="searchform js__toggle">
                <input type="search" placeholder="Search..." class="input-search">
                <button class="mdi mdi-magnify button-search" type="submit"></button>
            </form>
            <!-- /.searchform -->
        </div>
        <!-- /.ico-item -->
        
        <a class="ico-item mdi mdi-logout" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
        </a>

        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    <!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->