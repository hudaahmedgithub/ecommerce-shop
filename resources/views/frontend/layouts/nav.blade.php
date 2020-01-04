    <body>

        <!-- Start Navbar -->
        <nav class="navbar navbar-expand-lg fixed-top">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
      
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <form class="form-inline search-container ml-auto my-2 my-lg-0" id="searchAll">
                <i class="fas fa-search search-icon"></i>
                <input class="form-control mr-sm-2 search-in" type="search" placeholder="Search Products, Brands and Categories" aria-label="Search" id="search">
                <button class="btn btn-primary my-2 my-sm-0 search-btn" type="submit">@lang('nav.search')</button>
             
       </form>
              <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="far fa-user"></i>@lang('nav.login')
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a href="{{route('login')}}"><button class="btn btn-primary login-btn">@lang('login.login')</button></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('register')}}"><span class="text-primary text-selection">@lang('login.create_account')</span></a>
                    <div class="dropdown-divider" style="margin-bottom:0px"></div>
                    <a class="dropdown-item login-item" href="{{route('profile')}}"><i class="far fa-user"></i>@lang('login.account')</a>
                    <a class="dropdown-item login-item" href="{{route('profile')}}"><i class="fas fa-box"></i>@lang('login.orders')</a>
				 @auth
              
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class='fa fa-sign-out'></i> @lang('login.logout') ?
                    </a>
               
            @endauth
                  </div>
                </li>
		
            
            
				 
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="far fa-question-circle"></i>@lang('nav.help')
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <div class="dropdown-item text-center">Contact Us <br> 11999</div>
                    <div class="dropdown-divider" style="margin-bottom:0px"></div>
                    <a class="dropdown-item login-item" href="#">FAQs</a>
                    <a class="dropdown-item login-item" href="{{url('pages/contact')}}">Contact Us</a>
                  </div>
                </li>
				   <li class="nav-item">
                  <a class="nav-link" href="{{url('products')}}"><i class=""></i> @lang('nav.products') </a>
                </li>
               
			           <li class="nav-item">
                  <a class="nav-link" href="{{url('shopping-cart')}}"><i class="fas fa-shopping-cart"></i> @lang('nav.cart') ({{Cart::getTotalQuantity()}})</a>
                </li>
              </ul>
      
            </div>
          </nav>
          <!-- End Navbar -->
