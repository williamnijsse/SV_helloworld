<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="title" content="@yield('title')">
    <meta name="author" content="Studievereniging &quot;Hello World&quot;">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Studievereniging "Hello World" - @yield('title')</title>

    <link rel="icon" type="image/png" href="{{ asset('/images/icon.png') }}"/>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,600,300|Source+Serif+Pro"
          rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/flags.css') }}" />
@yield('stylesheets')

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Top bar -->
<div id="top-bar">
    <div class="container-fluid">
        <div class="container-inner">
            <div class="top-bar-section">
                <div class="navigation">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="/locale/nl">
                                <i class="flag flag-nl"></i>
                                NL
                            </a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="/locale/en">
                                <i class="flag flag-gb"></i>
                                EN
                            </a>
                    </ul>
                </div>
            </div>
            <div class="top-bar-section top-bar-section-social">
                <ul class="social">
                    <li>
                        <a href="https://github.com/sv-helloworld" target="_blank">
                            <i class="fa fa-github-alt"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/svhelloworld/" target="_blank">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/svhelloworld" target="_blank">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/s.v.helloworld/" target="_blank">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div><!--
                -->
            <div class="top-bar-section top-bar-section-navigation">
                <div class="navigation">
                    <ul id="top-bar-menu" class="menu">
                        <li>
                            <a href="{{ route('subscription.index') }}" class="">{{__('Lid worden')}}</a>
                        </li>
                        <li>
                            <a href="http://svhelloworld.nl" class="">Website</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Header -->
<header>
    <!-- Navigation -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-main"
                        aria-expanded="false">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">
                    <span>Studievereniging "Hello World"</span>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-main">
                <ul class="nav navbar-nav">
                    @include(config('laravel-menu.views.bootstrap-items'), array('items' => Menu::get('menu')->roots()))
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::check())
                        <li class="dropdown">
                            <a href="{{ route('account.index') }}" class="dropdown-toggle dropdown-profile"
                               data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img
                                    src="{{ Gravatar::get(Auth::user()->email) }}"
                                    class="avatar"> {{ Auth::user()->first_name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('account.index') }}">{{__('Overzicht')}}</a></li>
                                <li><a href="{{ route('account.edit') }}">{{__('Account wijzigen')}}</a></li>
                                <li><a href="{{ route('account.email.edit') }}">{{__('E-mailadres wijzigen')}}</a></li>
                                <li><a href="{{ route('account.password.edit') }}">{{__('Wachtwoord wijzigen')}}</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out"
                                                               aria-hidden="true"></i> {{__('Uitloggen')}}</a></li>
                    @else
                        <li><a href="{{ route('register') }}"><i class="fa fa-pencil-square-o"
                                                                 aria-hidden="true"></i> {{__('Registreren')}}</a></li>
                        <li><a href="{{ route('login') }}"><i class="fa fa-sign-in"
                                                              aria-hidden="true"></i> {{__('Inloggen')}}</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Banners -->
    <div id="banners">
        <div class="banner">
            <div class="banner-inner">
                <div class="banner-photo" style="background-image: url('/images/hz_middelburg.jpg');"></div>
            </div>
        </div>
    </div>
</header>

@include('cookieConsent::index')

<!-- Content -->
<section id="content">
    <div class="container-fluid">
        <div class="container-inner">
            <div class="row">
                @if (! Menu::get('sidebar')->all()->isEmpty())
                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-8">
                        @else
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                @endif
                                <div class="page-header">
                                    <h1>@yield('title')</h1>
                                </div>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        @if (count($errors->all()) > 1)
                                            <strong>{{ __('De volgende fouten hebben zich voorgedaan:') }}</strong>
                                        @else
                                            <strong>{{ __('De volgende fout heeft zich voorgedaan:') }}</strong>
                                        @endif
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if (Session::has('status'))
                                    <div class="alert alert-info">
                                        <span>{{ Session::get('status') }}</span>
                                    </div>
                                @endif

                                @include('flash::message')

                                @yield('content')
                            </div>

                            <!-- Sidebar -->
                            @if (! Menu::get('sidebar')->all()->isEmpty())
                                <aside id="secondary" class="col-xs-12 col-sm-12 col-md-3 col-lg-4 widget-area"
                                       role="complementary">

                                    <section class="widget widget_menu">
                                        <h2 class="widget-title">Menu</h2>
                                        <ul class="nav nav-pills nav-stacked">
                                            @include(config('laravel-menu.views.bootstrap-items'), array('items' => Menu::get('sidebar')->roots()))
                                        </ul>
                                    </section>


                                    @yield('sidebar')
                                </aside>
                            @endif

                    </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer id="footer">
    <div class="container-fluid">
        <div class="container-inner">
            <span>&copy; {{ Carbon\Carbon::now()->year }} Studievereniging "Hello World"</span>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="{{ asset('/js/vendor.min.js') }}"></script>
<script src="{{ asset('/js/app.min.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('/css/vendor.min.css') }}">
@yield('scripts')

</body>
</html>
