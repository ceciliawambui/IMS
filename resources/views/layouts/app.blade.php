<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="16x16" href="quixlab/images/favicon.png">
    <!-- Pignose Calender -->
    <link href=".quixlab/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href=".quixlab/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href=".quixlab/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="quixlab/css/style.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="quixlab/plugins/common/common.min.js"></script>
    <script src="quixlab/js/custom.min.js"></script>
    <script src="quixlab/js/settings.js"></script>
    <script src="quixlab/js/gleek.js"></script>
    <script src="quixlab/js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src=".quixlab/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src=".quixlab/plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src=".quixlab/plugins/d3v3/index.js"></script>
    <script src=".quixlab/plugins/topojson/topojson.min.js"></script>
    <script src=".quixlab/plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src=".quixlab/plugins/raphael/raphael.min.js"></script>
    <script src=".quixlab/plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src=".quixlab/plugins/moment/moment.min.js"></script>
    <script src=".quixlab/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src=".quixlab/plugins/chartist/js/chartist.min.js"></script>
    <script src=".quixlab/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



    <script src=".quixlab/js/dashboard/dashboard-1.js"></script>

</body>
</html>
