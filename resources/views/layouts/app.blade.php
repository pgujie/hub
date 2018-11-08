<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Off-Campus Accommodation">
    <meta name="author" content="Starlight">
    <meta name="author" content="Caan">
    <meta name="author" content="The Housing Hub">
    <title>Home - The Housing Hub</title>
    <!-- Favicon -->
{{--<link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">--}}
<!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
          integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="{{ asset('vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('assets/css/argon.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <style media="screen">

        .alert-notificatiions {

            position: fixed;
            z-index: 99999;
            bottom: 10%;
            right: 3%;

        }

    </style>
</head>

<body>

@if(Session::has('message-success'))
    <div  class="alert-notificatiions alert alert-success shadow-lg" role="alert">
        {{ Session::get('message-success') }}
    </div>
@endif

@if(Session::has('message-warning'))
    <div  class="alert-notificatiions alert alert-warning shadow-lg" role="alert">
        {{ Session::get('message-warning') }}
    </div>
@endif

@if(Session::has('message-danger'))
    <div  class="alert-notificatiions alert alert-danger shadow-lg" role="alert">
        {{ Session::get('message-danger') }}
    </div>
@endif

<header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
        <div class="container">
            <a class="navbar-link mr-lg-5" href="/">
                <h4 class="text-white"><sup>the</sup> HOUSING HUB</h4>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global"
                    aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="./index.html">
                                <img src="./assets/img/brand/blue.png">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                    data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav align-items-lg-center ml-lg-auto">

                    @if(!Auth::check())
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="{{ route('login') }}">
                                <i class="ni ni-key-25"></i>
                                <span class="nav-link-inner--text">Log In</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-icon" href="{{ route('register') }}">
                                <i class="ni ni-circle-08 "></i>
                                <span class="nav-link-inner--text">Register</span>
                            </a>
                        </li>
                    @else
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
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
<main>
    @yield('content')
</main>
<footer class="footer has-cards">
    <div class="container container-lg">
        {{--<div class="row">--}}
        {{--<div class="col-md-6 mb-5 mb-md-0">--}}
        {{--<div class="card card-lift--hover shadow border-0">--}}
        {{--<a href="./examples/landing.html" title="Landing Page">--}}
        {{--<img src="./assets/img/theme/landing.jpg" class="card-img">--}}
        {{--</a>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-6 mb-5 mb-lg-0">--}}
        {{--<div class="card card-lift--hover shadow border-0">--}}
        {{--<a href="./examples/profile.html" title="Profile Page">--}}
        {{--<img src="./assets/img/theme/profile.jpg" class="card-img">--}}
        {{--</a>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
    </div>
    <div class="container">
        <div class="row row-grid align-items-center my-md">
            <div class="col-lg-6">
                <h3 class="text-primary font-weight-light mb-2">Thank you for supporting us!</h3>
                <h4 class="mb-0 font-weight-light">Let's get in touch on any of these platforms.</h4>
            </div>
            <div class="col-lg-6 text-lg-center btn-wrapper">
                <a target="_blank" href="https://twitter.com/creativetim"
                   class="btn btn-neutral btn-icon-only btn-twitter btn-round btn-lg" data-toggle="tooltip"
                   data-original-title="Follow us">
                    <i class="fa fa-twitter"></i>
                </a>
                <a target="_blank" href="https://www.facebook.com/creativetim"
                   class="btn btn-neutral btn-icon-only btn-facebook btn-round btn-lg" data-toggle="tooltip"
                   data-original-title="Like us">
                    <i class="fa fa-facebook-square"></i>
                </a>
                <a target="_blank" href="https://dribbble.com/creativetim"
                   class="btn btn-neutral btn-icon-only btn-dribbble btn-lg btn-round" data-toggle="tooltip"
                   data-original-title="Follow us">
                    <i class="fa fa-dribbble"></i>
                </a>
                <a target="_blank" href="https://github.com/creativetimofficial"
                   class="btn btn-neutral btn-icon-only btn-github btn-round btn-lg" data-toggle="tooltip"
                   data-original-title="Star on Github">
                    <i class="fa fa-github"></i>
                </a>
            </div>
        </div>
        <hr>
        <div class="row align-items-center justify-content-xl-between">
            <div class="col-xl-6">
                <div class="copyright text-center text-xl-left text-muted">
                    &copy; <?php echo date("Y"); ?> <a class="font-weight-bold ml-1">The Housing Hub</a>
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
    </div>
</footer>
<!-- Core -->
<script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/popper/popper.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
@yield('scripts')
{{--<script src="{{ asset('assets/vendor/headroom.js/dist/headroom.min.js') }}"></script>--}}
<!-- Argon JS -->
<script src="{{ asset('js/argon.min.js') }}"></script>

</body>

</html>
