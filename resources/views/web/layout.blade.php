<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EstateAgency Bootstrap Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
    Theme Name: EstateAgency
    Theme URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

    <div class="click-closed"></div>
    <!--/ Form Search Star /-->
    <div class="box-collapse">
        <div class="title-box-d">
            <h3 class="title-d">Search Property</h3>
        </div>
        <span class="close-box-collapse right-boxed ion-ios-close"></span>
        <div class="box-collapse-wrap form">
            <form class="form-a" action="{{ route('web.search') }}" method="GET">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <div class="form-group">
                            <label for="city">{{ __('City') }}</label>
                            <input type="text" name="city" class="form-control form-control-lg form-control-a"
                                placeholder="City">
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form-group">
                            <label for="interest_type">{{ __('Interest Type') }}</label>
                            <select class="form-control form-control-lg form-control-a" name="interest_type"
                                id="interest_type">
                                <option value="">{{ 'Sin asignar' }}</option>
                                <option value="Compra">{{ 'Compra' }}</option>
                                <option value="Traspaso">{{ 'Traspaso' }}</option>
                                <option value="Alquiler">{{ 'Alquiler' }}</option>
                            </select>
                        </div>
                    </div>
                    {{-- <div class="col-md-6 mb-2">
                        <div class="form-group">
                            <label for="address">{{ __('Address') }}</label>
                            <input type="text" name="address" class="form-control form-control-lg form-control-a"
                                placeholder="Address">
                        </div>
                    </div> --}}
                    <div class="col-md-6 mb-2">
                        <div class="form-group">
                            <label for="rooms">{{ __('Rooms') }}</label>
                            <input type="text" name="rooms" class="form-control form-control-lg form-control-a"
                                placeholder="Rooms">
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form-group">
                            <label for="bath">{{ __('Bathrooms') }}</label>
                            <input type="text" name="bath" class="form-control form-control-lg form-control-a"
                                placeholder="Bathrooms">
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <div class="form-group">
                            <label for="max_value">{{ __('Max Value') }}</label>
                            <select class="form-control form-control-lg form-control-a" name="max_value" id="max_value">
                                <option value="10000000000000000000000000000000000000000000">{{ __('Sin asignar') }}
                                </option>
                                <option value="50000">{{ __('$50,000') }}</option>
                                <option value="100000">{{ __('$100,000') }}</option>
                                <option value="150000">{{ __('$150,000') }}</option>
                                <option value="200000">{{ __('$200,000') }}</option>
                                <option value="250000">{{ __('$250,000') }}</option>
                                <option value="300000">{{ __('$300,000') }}</option>
                                <option value="400000">{{ __('$400,000') }}</option>
                                <option value="500000">{{ __('$500,000') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-b">{{ __('Search') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--/ Form Search End /-->

    <!--/ Nav Star /-->
    <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
        <div class="container">
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
                aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <a class="navbar-brand text-brand" href="{{ route('web.index') }}">Inmo<span
                    class="color-b">data</span></a>
            <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none"
                data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
                <span class="fa fa-search" aria-hidden="true"></span>
            </button>
            <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('web.index') ? 'active' : '' }}"
                            href="{{ route('web.index') }}">{{ __('Home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('web.estates') ? 'active' : '' }} {{ request()->routeIs('web.search') ? 'active' : '' }}"
                            href="{{ route('web.estates') }}">{{ __('Estates') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('web.agents') ? 'active' : '' }}"
                            href="{{ route('web.agents') }}">{{ __('Agents') }}</a>
                    </li>{{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Pages
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item {{ request()->routeIs('web.estate') ? 'active' : '' }}" href="{{route('web.estate')}}">{{__('Estate')}}</a>
              <a class="dropdown-item {{ request()->routeIs('web.agent') ? 'active' : '' }}" href="{{route('web.agent')}}">{{__('Agent')}}</a>
            </div>
          </li> --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('web.contact') ? 'active' : '' }}"
                            href="{{ route('web.contact') }}">{{ __('Contact') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('web.about') ? 'active' : '' }}"
                            href="{{ route('web.about') }}">{{ __('About') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                            href="{{ route('home') }}" target="__blank">{{ __('Admin') }}</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                                                                                                                                                                                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endauth
                    @guest
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('web.login') ? 'active' : '' }}"
                                href="{{ route('web.login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('web.register') ? 'active' : '' }}"
                                href="{{ route('web.register') }}">{{ __('Register') }}</a>
                        </li>
                    @endguest
                </ul>
            </div>
            <button type=" button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block"
                data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
                <span class="fa fa-search" aria-hidden="true"></span>
            </button>
        </div>
    </nav>
    <!--/ Nav End /-->

    @yield('content')

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="nav-footer">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="{{ route('web.index') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route('web.about') }}">{{ __('About') }}</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route('web.estates') }}">{{ __('Estates') }}</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route('web.agents') }}">{{ __('Agents') }}</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route('web.contact') }}">{{ __('Contact') }}</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="socials-a">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="https://www.facebook.com/ale.melgarejo.3/" target="__blank">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://twitter.com/melgarejoale" target="__blank">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://www.instagram.com/alemelgarejo96/" target="__blank">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route('web.index') }}" target="__blank">
                                    <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="copyright-footer">
                        <p class="copyright color-text-a">
                            &copy; Copyright
                            <span class="color-a">Inmodata</span> All Rights Reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/ Footer End /-->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <div id="preloader"></div>

    <!-- JavaScript Libraries -->
    <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('lib/jquery/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('lib/popper/popper.min.js') }}"></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/scrollreveal/scrollreveal.min.js') }}"></script>
    <!-- Contact Form JavaScript File -->
    <script src="{{ asset('contactform/contactform.js') }}"></script>

    <!-- Template Main Javascript File -->
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
