<div class="main-menu">

    <header class="header">
        <a href="" class="logo"><i class="ico mdi mdi-cube-outline"></i> {{ __('sidebar.control_panel') }}</a>
        <button type="button" class="button-close fa fa-times js__menu_close"></button>
        <div class="user">
            <a href="#" class="avatar">
                <img src="{{ url('assets/images/avatar-sm-5.jpg') }}" alt="">
                <span class="status online"></span>
            </a>
            <h5 class="name">
                <a href="#profile.html">{{ Auth::guard('admin')->user()->name }}</a>
            </h5>
            <h5 class="position">{{ __('sidebar.administrator') }}</h5>
            <!-- /.name -->
            <div class="control-wrap js__drop_down">
                <i class="fa fa-caret-down js__drop_down_button"></i>
                <div class="control-list">
                    
                    <div class="control-item">
                        <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> {{ __('sidebar.logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>

                </div>
                <!-- /.control-list -->
            </div>
            <!-- /.control-wrap -->
        </div>
        <!-- /.user -->
    </header>
    <!-- /.header -->

    <div class="content">

        <div class="navigation" style='background: #fff'>
            <h5 class="title">{{ __('sidebar.navigation') }}</h5>
            <!-- /.title -->
            <ul class="menu js__accordion">
                <li class="{{ set_active('home', 'current') }}">
                    <a class="waves-effect" href="{{ route('admin.home') }}"><i class="menu-icon mdi mdi-view-dashboard"></i>
                        <span>{{ __('sidebar.dashboard') }}</span>
                    </a>
                </li>
                <li class="{{ set_active('categories', 'current') }}">
                    <a class="waves-effect" href="{{ route('admin.categories.index') }}"><i class="menu-icon mdi mdi-apps"></i>
                        <span>{{ __('sidebar.categories') }}</span>
                    </a>
                </li>
                <li class="{{ set_active('products', 'current') }}">
                    <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-basket"></i>
                        <span>{{ __('sidebar.products') }}</span>
                        <i class="fa fa-angle-down pull-left" style="margin: 5px auto;"></i>
                    </a>
                    <ul class="sub-menu js__content">
                        <li><a href="{{ route('admin.products.index') }}">{{ __('sidebar.products') }}</a></li>
                        <li><a href="{{ route('admin.sliders.index') }}">{{ __('sidebar.slider') }}</a></li>
                    </ul>
                    <!-- /.sub-menu js__content -->
                </li>

                <li class="{{ set_active('reservations', 'current') }}">
                    <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-cart-outline"></i>
                        <span>{{ __('sidebar.reservations') }}</span>
                        <i class="fa fa-angle-down pull-left" style="margin: 5px auto;"></i>
                    </a>
                    <ul class="sub-menu js__content">
                        <li><a href="{{ route('admin.reservations.index') }}">{{ __('sidebar.reservations') }}</a></li>
                        <li><a href="{{ route('admin.reservations.analytics') }}">{{ __('sidebar.analytics') }}</a></li>
                    </ul>
                </li>
                <li class="{{ set_active('reviews', 'current') }}">
                    <a class="waves-effect" href="{{ route('admin.reviews.index') }}"><i class="menu-icon mdi mdi-message-text"></i>
                        <span>{{ __('sidebar.reviews') }}</span>
                    </a>
                </li>
            </ul>
            <h5 class="title">{{ __('sidebar.measure_currency') }}</h5>
            <!-- /.title -->
            <ul class="menu js__accordion">
                <li class="{{ set_active('currencies', 'current') }}">
                    <a class="waves-effect" href="{{ route('admin.currencies.index') }}"><i class="menu-icon mdi mdi-currency-usd"></i>
                        <span>{{ __('sidebar.currency') }}</span>
                    </a>
                </li>
                <li class="{{ set_active('countries', 'current') }}">
                    <a class="waves-effect" href="{{ route('admin.countries.index') }}"><i class="menu-icon mdi mdi-view-dashboard"></i>
                        <span>{{ __('sidebar.countries') }}</span>
                    </a>
                </li>
                <li class="{{ set_active('coupons', 'current') }}">
                    <a class="waves-effect" href="{{ route('admin.coupons.index') }}"><i class="menu-icon mdi mdi-ticket"></i>
                        <span>{{ __('sidebar.coupons') }}</span>
                    </a>
                </li>
                {{--
                <li class="{{ set_active('contacts', 'current') }}">
                    <a class="waves-effect" href="{{ route('admin.contacts.index') }}"><i class="menu-icon mdi mdi-view-dashboard"></i>
                        <span>{{ __('sidebar.contacts') }}</span>
                    </a>
                </li>
                --}}
            </ul>
            <!-- /.menu js__accordion -->
            <!-- /.menu js__accordion -->
            <h5 class="title">{{ __('sidebar.other') }}</h5>
            <!-- /.title -->
            <ul class="menu js__accordion">
                <li class="{{ set_active('users', 'current') }}">
                    <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-account-multiple"></i>
                        <span>{{ __('sidebar.users_manage') }}</span>
                        <i class="fa fa-angle-down pull-left" style="margin: 5px auto;"></i>
                    </a>
                    <ul class="sub-menu js__content">
                        <li><a href="{{ route('admin.users.index') }}">{{ __('sidebar.all_users') }}</a></li>
                        <li><a href="{{ route('admin.users.trashed') }}">{{ __('sidebar.trashed_users') }}</a></li>
                    </ul>
                    <!-- /.sub-menu js__content -->
                </li>
                <li class="{{ set_active('admins', 'current') }}">
                    <a class="waves-effect parent-item js__control" href="{{ route('admin.users.index') }}"><i class="menu-icon mdi mdi-account-multiple"></i>
                        <span>{{ __('sidebar.admins_manage') }}</span>
                        <i class="fa fa-angle-down pull-left" style="margin: 5px auto;"></i>
                    </a>
                    <ul class="sub-menu js__content">
                        <li><a href="{{ route('admin.admins.index') }}">{{ __('sidebar.all_admins') }}</a></li>
                        <li><a href="{{ route('admin.admins.trashed') }}">{{ __('sidebar.trashed_admins') }}</a></li>
                    </ul>
                    <!-- /.sub-menu js__content -->
                </li>
            </ul>
            <!-- /.menu js__accordion -->
        </div>
        <!-- /.navigation -->
    </div>
    <!-- /.content -->

</div>
