<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <base href="../" target="_self">
    <title>The Housing Hub</title>

    <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="{{ asset('vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
    {{--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"--}}
          {{--integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">--}}
    {{----}}
    <link href="{{ asset('vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet">
    {{--<link type="text/css" href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">--}}

</head>

<body>
<!-- Sidenav -->
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a href="/" class="navbar-brand pt-0" role="button" data-link="overview">
            {{--<img src="./assets/img/brand/blue.png" class="navbar-brand-img" alt="The housing Hub">--}}
            The housing Hub
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown show">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle shadow-lg">
                                    @if(auth()->user()->gender == 'female')
                                        <img alt="Image placeholder" src="{{ asset('img/users/194826fmail.png') }}">
                                    @else
                                        <img alt="Image placeholder" src="{{ asset('img/users/indexmale.png') }}">
                                    @endif
                                </span>
                        <div class="media-body ml-2 d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold"> {{ auth()->user()->full_name }} </span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <a href="/dashboard"  data-link="profile" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>Dashboard</span>
                    </a>
                    <a data-link="profile" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>My profile</span>
                    </a>
                    <a data-link="settings" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>Settings</span>
                    </a>
                    <a data-link="overview" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>Activity</span>
                    </a>
                    <a data-link="feedback" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>Support</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="#overview">
                            <img src="./assets/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a href="/dashboard" class="nav-link active" role="button" data-link="overview">
                        <i class="ni ni-chart-bar-32 text-primary"></i> Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link " role="button" data-toggle="collapse" data-target="#submenu1">
                        <i class="fa fa-building text-primary"></i> Properties
                    </a>
                    <ul class="nav nav-list collapse" id="submenu1">
                        <li class="nav-item">
                            <a href="/properties/dash-view?selection=all" class="nav-link pl-5" role="button" data-link="overview">
                                <i class="fa fa-user text-primary"></i> My Properties
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/properties/dash-view?selection=my-properties" class="nav-link pl-5" role="button" data-link="overview">
                                <i class="fa fa-building text-primary"></i> All Properties
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/applications/dash-view" class="nav-link pl-5" role="button" data-link="overview">
                                <i class="fa fa-paperclip text-primary"></i> Applications
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/contracts/dash-view" class="nav-link pl-5" role="button" data-link="overview">
                                <i class="fa fa-file-contract text-primary"></i> Contracts
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link " role="button" data-toggle="collapse" data-target="#submenu2-1">
                        <i class="fa fa-paperclip text-primary"></i> Applications
                    </a>
                    <ul class="nav nav-list collapse" id="submenu2-1">
                        <li class="nav-item">
                            <a href="/properties/dash-view?selection=all" class="nav-link pl-5" role="button" data-link="overview">
                                <i class="fa fa-user text-primary"></i> My Applications
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/properties/dash-view?selection=my-properties" class="nav-link pl-5" role="button" data-link="overview">
                                <i class="fa fa-folder text-primary"></i> All Applications
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link " role="button" data-toggle="collapse" data-target="#submenu2">
                        <i class="fa fa-file-contract text-primary"></i> Contracts
                    </a>
                    <ul class="nav nav-list collapse" id="submenu2">
                        <li class="nav-item">
                            <a href="/properties/dash-view?selection=all" class="nav-link pl-5" role="button" data-link="overview">
                                <i class="fa fa-user text-primary"></i> My Contracts
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/properties/dash-view?selection=my-properties" class="nav-link pl-5" role="button" data-link="overview">
                                <i class="fa fa-folder text-primary"></i> All Contracts
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link " role="button" data-toggle="collapse" data-target="#submenu3">
                        <i class="fa fa-users text-primary"></i>  Users
                    </a>
                    <ul class="nav nav-list collapse" id="submenu3">
                        <li class="nav-item">
                            <a href="/properties/dash-view?selection=all" class="nav-link pl-5" role="button" data-link="overview">
                                <i class="fa fa-users-cog text-primary"></i> All Users
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/properties/dash-view?selection=my-properties" class="nav-link pl-5" role="button" data-link="overview">
                                <i class="fa fa-user-tie text-primary"></i> Agents
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/properties/dash-view?selection=my-properties" class="nav-link pl-5" role="button" data-link="overview">
                                <i class="fa fa-user text-primary"></i> Clients
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/properties/dash-view?selection=my-properties" class="nav-link pl-5" role="button" data-link="overview">
                                <i class="fa fa-user-lock text-primary"></i> Owners
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/properties/dash-view?selection=my-properties" class="nav-link pl-5" role="button" data-link="overview">
                                <i class="fa fa-user-astronaut text-primary"></i> Admins
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link " role="button" data-toggle="collapse" data-target="#submenu5">
                        <i class="fa fa-user-graduate text-primary"></i>  Institutions
                    </a>
                    <ul class="nav nav-list collapse" id="submenu5">
                        <li class="nav-item">
                            <a href="/properties/dash-view?selection=all" class="nav-link pl-5" role="button" data-link="overview">
                                <i class="fa fa-user text-primary"></i> My Institution
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/properties/dash-view?selection=my-properties" class="nav-link pl-5" role="button" data-link="overview">
                                <i class="fa fa-graduation-cap text-primary"></i> All Institutions
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" role="button" data-link="profile">
                        <i class="ni ni-circle-08 text-pink"></i> My Profile
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="main-content">

    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid  p-2 mt--3">
            <!-- Brand -->
            <a id="pagename" class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">DashBoard</a>

            <!-- User -->
            <ul class="navbar-nav align-items-center d-none d-md-flex">
                <li class="nav-item dropdown show">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle shadow-lg">
                                    @if(auth()->user()->gender == 'female')
                                        <img alt="Image placeholder" src="{{ asset('img/users/194826fmail.png') }}">
                                    @else
                                        <img alt="Image placeholder" src="{{ asset('img/users/indexmale.png') }}">
                                    @endif
                                </span>
                            <div class="media-body ml-2 d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold"> {{ auth()->user()->full_name }} </span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <a href="/dashboard"  data-link="profile" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>Dashboard</span>
                        </a>
                        <a data-link="profile" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>My profile</span>
                        </a>
                        <a data-link="settings" class="dropdown-item">
                            <i class="ni ni-settings-gear-65"></i>
                            <span>Settings</span>
                        </a>
                        <a data-link="overview" class="dropdown-item">
                            <i class="ni ni-calendar-grid-58"></i>
                            <span>Activity</span>
                        </a>
                        <a data-link="feedback" class="dropdown-item">
                            <i class="ni ni-support-16"></i>
                            <span>Support</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="ni ni-user-run"></i>
                            <span>{{ __('Logout') }}</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


        @yield('content')

    <div class="container pt-lg-4 px-5">
        <footer class="footer">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted">
                        &copy; {{ date("Y") }} <a class="font-weight-bold ml-1">The Housing Hub</a>
                    </div>
                </div>
                <div class="col-xl-6">
                    <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                        <li class="nav-item">
                            <a href="https://caan.co.zw" class="nav-link" target="_blank">Caan</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://starlight.co.zw" class="nav-link" target="_blank">Starlight</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://thehousinghub.co.zw" class="nav-link" target="_self">Homepage</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" target="_blank">Advertise</a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>

</div>
<!-- Core -->
<script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/popper/popper.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
@yield('scripts')
<!-- Argon JS -->
<script src="{{ asset('js/argon.min.js') }}"></script>

</body>

</html>
