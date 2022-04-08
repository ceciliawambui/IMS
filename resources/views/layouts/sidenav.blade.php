<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Invent</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Pignose Calender -->
    {{-- <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet --> --}}
    <link href="quixlab/css/style.css" rel="stylesheet">

</head>

<body>
    <div id="main-wrapper">
        <div class="nav-header">
            <div class="brand-logo">
                <a>
                    {{-- <b class="logo-abbr"><img src="images/logo.png" alt=""> </b> --}}
                    {{-- <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span> --}}
                    <span class="text-center" style="color:white; font-size: 40px; padding:10px">
                        Invent
                        {{-- <img src="images/logo-text.png" alt=""> --}}
                    </span>
                </a>
            </div>
        </div>
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div class="drop-down animated flipInX d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
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
                            <li class="dropdown">
                                @if (Auth::user()->hasRole('admin'))
                                    {{-- <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li> --}}
                                    {{-- <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li> --}}
                                    {{-- <li><a class="nav-link" href="{{ route('products.index') }}">Manage Products</a></li>
                            <li><a class="nav-link" href="{{ route('categories.index') }}">Manage Categories</a>
                            </li>
                            <li><a class="nav-link" href="{{ route('suppliers.index') }}">Manage Suppliers</a></li> --}}
                                @endif
                                {{-- <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li> --}}
                                {{-- <li><a class="nav-link" href="{{ route('products.index') }}">Manage Products</a></li> --}}
                            <li class=" dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </li>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                            </div>
                            </li>

                            </li>
                        @endguest
                    </ul>
                </div>

            </div>
        </div>


        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label"> Dashboard</a></li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('home') }}">Dashboard</a></li>

                        </ul>
                    </li>
                    @if (Auth::user()->hasRole('admin'))
                        <li class="mega-menu mega-menu-sm">
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Manage
                                    Suppliers</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ url('suppliers') }}">Suppliers</a></li>

                            </ul>
                        </li>
                        <li class="mega-menu mega-menu-sm">
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-envelope menu-icon"></i><span class="nav-text">Manage Categories
                                </span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ url('categories') }}">Categories</a></li>

                            </ul>
                        </li>
                        <li class="mega-menu mega-menu-sm">
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-layers menu-icon"></i><span class="nav-text">Manage Products</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ url('products') }}">Products</a></li>

                            </ul>
                        </li>
                        <li class="mega-menu mega-menu-sm">
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-grid menu-icon"></i><span class="nav-text">Manage Sales</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ url('sales') }}">Point Of Sale</a></li>
                                <li><a href="{{ url('customers') }}">Customers</a></li>

                            </ul>
                        </li>
                        <li class="mega-menu mega-menu-sm">
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-graph menu-icon"></i><span class="nav-text">View Reports</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="./index.html">Reports</a></li>

                            </ul>
                        </li>
                        <li class="mega-menu mega-menu-sm">
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Manage Users</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ route('users.index') }}">Users</a></li>

                            </ul>
                        </li>
                        <li class="mega-menu mega-menu-sm">
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Manage User
                                    Roles</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ route('roles.index') }}">User Roles</a></li>

                            </ul>
                        </li>
                    @endif
                    @if (Auth::user()->hasRole('user'))
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-grid menu-icon"></i><span class="nav-text">Manage Sales</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('sales') }}">Point Of Sale</a></li>
                            <li><a href="{{ url('customers') }}">Customers</a></li>

                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>

        <div class="content-body">

            <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Products Sold</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">4565</h2>
                                    <p class="text-white mb-0">Jan - March 2019</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                            </div>
                        </div>
                    </div>
                    @if (Auth::user()->hasRole('admin'))
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Net Profit</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">$ 8541</h2>
                                    <p class="text-white mb-0">Jan - March 2019</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">New Customers</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">4565</h2>
                                    <p class="text-white mb-0">Jan - March 2019</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Customer Satisfaction</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">99%</h2>
                                    <p class="text-white mb-0">Jan - March 2019</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        {{-- <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by C.M Wambui 2022.</p>
            </div>
        </div> --}}
    </div>
{{--
    <script src="quixlab/plugins/common/common.min.js"></script>
    <script src="quixlab/js/custom.min.js"></script>
    <script src="quixlab/js/settings.js"></script>
    <script src="quixlab/js/gleek.js"></script>
    <script src="quixlab/js/styleSwitcher.js"></script> --}}

    <!-- Chartjs -->
    {{-- <script src="./quixlab/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="./quixlab/plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="./quixlab/plugins/d3v3/index.js"></script>
    <script src="./quixlab/plugins/topojson/topojson.min.js"></script>
    <script src="./quixlab/plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="./quixlab/plugins/raphael/raphael.min.js"></script>
    <script src="./quixlab/plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="./quixlab/plugins/moment/moment.min.js"></script>
    <script src="./quixlab/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="./quixlab/plugins/chartist/js/chartist.min.js"></script>
    <script src="./quixlab/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script> --}}

    {{-- <script src="./quixlab/js/dashboard/dashboard-1.js"></script> --}}
</div>

</body>

</html>
