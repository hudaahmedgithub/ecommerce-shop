<!-- Start Top bar -->
<nav class="topBar">
    <div class="container">
        <ul class="list-inline pull-left hidden-sm hidden-xs">
            <li><span class="text-primary">Have a question? </span> Call +120 558 7885</li>
        </ul>
        <ul class="topBarNav pull-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                    data-close-others="false"> <span class="hidden-xs"> {{ ucfirst(app()->getLocale()) }}
                        <i class="fa fa-angle-down ml-5"></i></span>
                </a>
                <ul class="dropdown-menu w-100 custom-menu" role="menu">
                    @foreach (Config::get('translatable.locales') as $lang)
                        @if ($lang != App::getLocale())
                            <li>
                                <a href="{{ route('language', $lang) }}">{{$lang}}</a>
                            </li>
                        @endif
                    @endforeach

                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                    data-close-others="false"> <i class="fa fa-user mr-5"></i>
                    <span class="hidden-xs">
                        @guest
                            Account
                        @else
                            {{ auth()->user()->name }}
                        @endguest
                        <i class="fa fa-angle-down ml-5"></i>
                    </span>
                </a>
                {{-- style="color: #34ab18;" --}}
                <ul class="dropdown-menu w-150 custom-menu" role="menu">
                    @auth
                    <li>
                        <a style="padding: 10px" class="custom-menu-item" href="{{ url('profile') }}">Profile</a>
                    </li>
                    @else
                    <li>
                        <a class="custom-menu-item" data-toggle="modal" href="#Login_Modal">Login</a>
                    </li>
                    <hr>
                    <li>
                        <a class="custom-menu-item" href="{{ url('register') }}">Create Account</a>
                    </li>
                    @endauth
                </ul>
            </li>

            <!-- CART -->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle cart_open" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">
                    <i class="fa fa-shopping-basket mr-5"></i>
                    <span class="hidden-xs">
                            Cart <span class="text-primary">(<span class="_cartCount">{{ $cartCount }}</span>)</span>
                            <i class="fa fa-angle-down ml-5"></i>
                    </span>
                </a>
                <ul class="dropdown-menu cart" role="menu">
                    <li>
                        <div class="cart-items">
                            <ol class="items">
                                <li class="products-subtitle">
                                    <span>(<span class="_cartCount">{{ $cartCount }}</span>) item(s)</span> in The cart.
                                </li>
                                <div id='__itemsBox'>
                                @foreach ($cartContent as $item)
                                    <!-- start item -->
                                    <li id="_item-{{ $item['id'] }}">
                                        <a href="{{ route('products.show', ['id' => $item['id']]) }}" class="product-img">
                                            <img src="{{ Storage::url($item['attributes']['image']) }}" alt="{{ $item['name'] }}" width="50" height="50">
                                        </a>
                                        <!-- start product-details -->
                                        <div class="product-info">
                                            (<b class='badge' style='background: gold;'><span class='_quantity-info'>{{ $item['quantity'] }}</span>x</b>)
                                            <a href="{{ route('products.show', ['id' => $item['id']]) }}" class="product-name">{{ $item['name'] }}</a>
                                            <h3 class="product-price">{{ $item['price'] . ' ' . $item['attributes']['currency'] }}</h3>
                                        </div>
                                        <div class="product-controls">
                                            <a href="javascript:void(0)" class="_deleteCart" data-id="{{$item['id']}}"> <i class="fa fa-trash"></i> </a>
                                            <a href="{{ route('products.show', ['id' => $item['id']]) }}"> <i class="fa fa-eye"></i> </a>
                                        </div> <!-- end product-details -->
                                    </li> <!-- end item -->
                                @endforeach
                                </div>

                                <li class="products-total">
                                    <span>Subtotal</span>
                                    <span class="price _subtotal">{{ Cart::getSubTotal() }}</span>
                                </li>
                            </ol>
                        </div>
                    </li>
                    <li>
                        <div class="cart-footer">
                            <a href="{{ route('cart.index') }}" class="pull-left">
                                <i class="fa fa-cart-plus mr-5"></i> View Cart
                            </a>

                            <a href="{{ route('cart.checkout') }}" class="pull-right">
                                <i class="fa fa-shopping-basket mr-5"></i> Checkout
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
            <!-- CART -->

            @auth
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class='fa fa-sign-out'></i> Logout ?
                    </a>
                </li>
            @endauth
        </ul>
    </div>
</nav><!-- End Top bar -->


<!-- Start Middle bar -->
<div class="middleBar">
    <div class="container">
        <div class="row display-table">
            <div class="col-sm-3 vertical-align text-left hidden-xs">
                <a href="{{ url('/') }}">
                    <img src="{{ url('imgs/logo.jpg') }}" width="50" height="50" style="border-radius: 50%" alt="">
                </a>
            </div>
            <!-- end col -->
            <div class="col-sm-8 vertical-align text-center">
                <form method="GET" id="search" action="{{ route('web.search') }}">
                    <div class="row grid-space-1">
                        <div class="col-sm-6">
                            <input type="text" name="keyword" class="form-control input-lg" placeholder="Search" value="">
                        </div>
                        <div class="col-sm-3">
                            <input type="submit" class="btn btn-default btn-block btn-lg" value="Search">
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </form>
            </div>
            <!-- end col -->
        </div>
        <!-- end  row -->
    </div>
</div><!-- End Middle bar -->


<!-- Start Main bar -->
<nav class="navbar navbar-main navbar-default" role="navigation" style="opacity: 1;">
    <div class="container">
        <!-- Brand and toggle -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links,  -->
        <div class="collapse navbar-collapse navbar-1" style="margin-top: 0px;">
            <ul class="nav navbar-nav">
                @foreach ($categories as $category)
                <li>
                    <a href="{{ route('category.show', [$category->id]) }}" class="dropdown-toggle" data-hover="dropdown">{{$category->name}}</a>
                </li>
                @endforeach
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav><!-- End Main bar -->
