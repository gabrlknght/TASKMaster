<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <?php if (\Request::is('login')) { ?> <!-- Auto-hides 'Register' menu item on login page -->
                              <li><a href="{{ route('register') }}">Register</a></li>
                            <?php } ?>
                            <?php if (\Request::is('register')) { ?> <!-- Auto-hides 'Login' menu item on register page -->
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <?php } ?>
                            <?php if ((\Request::is('crud')) || (\Request::is('crud/create'))) { ?> <!-- Shows 'Login / Register' menu items on index and create pages when not logged in -->
                            <li><a href="{{ route('register') }}">Register</a></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <?php } ?>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

       <!-- Application header -->
        <header>
          <div class="container">
            <div id="main-nav" class="well well-sm pull-right"><p class="text-info text-center"><strong>MENU</strong></p>
              <?php if (\Request::is('crud')) { ?> <!-- Auto-hides 'Create New' on all pages except front -->
                <a href="{{action('CRUDController@create')}}" class="btn btn-md btn-primary" style="margin-right: 0.5em;" title="Create New">&#10133;<span class="hidden-xs">&nbsp;&nbsp;Create New</span></a>
              <?php } ?>
                <a href="{{action('CRUDController@index')}}" class="btn btn-md btn-info pull-right" title="View All">&#128065;<span class="hidden-xs">&nbsp;&nbsp;View All</span></a>
            </div>
            <h1><a href="/crud" style="text-decoration: none;" title="Back to TASKMaster Index">&#9997; TASKMaster</a></h1>
            <p class="text-secondary">Actually, it's just a really CRUDdy app!</p>
          </div>
        </header>

        @yield('content')
    </div>

    <footer class="container">
      <hr/>
      <p class="text-info text-center">&copy; <?= date('Y') ?> Avik Nandy &middot; All Rights Reserved</p>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>$('div.alert').not('.alert-important').delay(3000).fadeOut(350);</script>
</body>
</html>
