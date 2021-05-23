<header class="section-header">
    <section class="header-main border-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-3 col-md-12">
                    <a href="{{ url('/') }}" class="brand-wrap">
                        <img class="logo" src="/app/images/logo.png">
                    </a> <!-- brand-wrap.// -->
                </div>
                <div class="col-xl-6 col-lg-5 col-md-6">
                    <form action="#" class="search-header">
                        <div class="input-group w-100">

                            <input type="text" class="form-control" placeholder="Search">

                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-search"></i> Search
                                </button>
                            </div>
                        </div>
                    </form> <!-- search-wrap .end// -->
                </div> <!-- col.// -->
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="widgets-wrap float-md-right">

                        <div class="widget-header">
                            @if (Route::has('login'))
                                @auth
                                    @hasanyrole('Admin')
                                    <a href="{{ route('admin.home') }}" class="widget-view">

                                        <div style="color:#969696">
                                            <b style="font-size:1rem">Dashboard</b>
                                        </div>
                                    </a>
                                    @endhasanyrole

                                    @hasrole('Vendor')
                                    <a href="{{ route('vendor.home') }}" class="widget-view">

                                        <div style="color:#969696">
                                            <b style="font-size:1rem">Dashboard</b>
                                        </div>
                                    </a>
                                    @endhasrole

                                    @hasrole('Buyer')
                                    <a href="{{ route('buyer.home') }}" class="widget-view">

                                        <div style="color:#969696">
                                            <b style="font-size:1rem">Dashboard</b>
                                        </div>
                                    </a>
                                    @endhasrole
                                @else
                                    <a href="{{ route('login') }}" class="widget-view">
                                        <div style="color:#969696">
                                            <b style="font-size:1rem">Login|Signup</b>
                                        </div>


                                    </a>


                                @endauth

                            @endif
                        </div>

                        <div class="widget-header">

                            <a href="{{ route('cart.index') }}" class="widget-view">

                                <div class="icon-area">
                                    <i class="fas fa-heart" style="font-size:1rem"></i><sup
                                        style="color:#ff6a00">0</sup>
                                </div>

                                <div class="icon-area">
                                    <i class="fas fa-shopping-basket" style="font-size:1rem"></i><sup
                                        style="color:#ff6a00">{{ Cart::count() }}</sup>

                                </div>

                            </a>
                        </div>

                    </div> <!-- widgets-wrap.// -->
                </div> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- container.// -->
    </section> <!-- header-main .// -->

    <nav class="navbar navbar-main navbar-expand-lg border-bottom">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link  {{ request()->is('/') ? 'active-link' : '' }}" href="{{ url('/') }}"> Home
                        </a>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('shop') ? 'active-link' : '' }}" href="{{ route('shop.index') }}">Gallery</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Artists</a>
                        <div class="dropdown-menu dropdown-menu-right">
                            @if (count($vendors) > 0)

                                @foreach ($vendors as $artist)
                                    <a class="dropdown-item"
                                        href="{{ route('artist', $artist->id) }}">{{ $artist->name }}</a>

                                @endforeach
                            @else

                            @endif
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active-link' : '' }}" href="{{route('about')}}">About Us</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact') ? 'active-link' : '' }}" href="{{ route('contact') }}">Contact Us</a>
                    </li>

                </ul>

            </div> <!-- collapse .// -->
        </div> <!-- container .// -->
    </nav>

</header>
