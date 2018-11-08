@extends('layouts.dashboard',[ 'title' => 'Properties' ])
@section('content')

    <div class="header bg-gradient-warning  pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row justify-content-center">

                    <div class="col-lg-10 px-0">
                        <div class="card bg-secondary shadow border-0">
                            <div class="card-header bg-white pb-2">
                                <div class="text-muted text-center mb-3">
                                    <h5>Register with The Housing Hub</h5>
                                </div>
                            </div>
                            <div class="alert alert-success alert-dismissible fade show text-center" style="border-radius: 0" role="alert">
                                <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                                <span class="alert-inner--text"><strong>Success!</strong> This is a success alert—check it out!</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="card-body px-lg-5 py-lg-5">

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="row justify-content-center">
                                        <div class="col-lg-6">
                                            <div class="text-center text-muted mb-4">
                                                <small>Personal details</small>
                                            </div>
                                            <div class="form-group mb-3">
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                                    </div>
                                                    <input id="name" type="text" placeholder="First Name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                                    @if ($errors->has('name'))
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                                    </div>
                                                    <input id="last_name" placeholder="Last Name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>
                                                    @if ($errors->has('last_name'))
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('last_name') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                    </div>
                                                    <input id="phone" placeholder="Phone Number" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus>

                                                    @if ($errors->has('phone'))
                                                        <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $errors->first('phone') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-pin-3"></i></span>
                                                    </div>
                                                    <textarea id="address" placeholder="Address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" required autofocus>{{ trim( old('address') ) }}</textarea>
                                                    @if ($errors->has('address'))
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('address') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="text-center text-muted mb-4">
                                                <small>Login details</small>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                                    </div>
                                                    <input id="email" placeholder="Email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="ni ni-key-25"></i></span>
                                                    </div>
                                                    <input id="password" placeholder="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                    @endif                                            </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                                    </div>
                                                    <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-success my-4">Go for it</button>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-6 text-right">
                                                    <label class="text-light">
                                                        <small>Already registered?</small>
                                                    </label>
                                                </div>
                                                <div class="col-6 text-left">
                                                    <a href=" {{ route('login') }}" data-toggle="modal" data-target="#login-form" class="text-light" data-dismiss="modal">
                                                        <small>Login</small>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{--<div class="container-fluid mt--8">--}}
    {{--<div class="row mt-5">--}}
    {{--<div class="col-xl-12 mb-5 mb-xl-0">--}}
    {{--<div class="card shadow">--}}
    {{--<div class="card-header border-0">--}}
    {{--<div class="row align-items-center">--}}
    {{--<div class="col-lg-7">--}}
    {{--<h3 class="mb-0">Heading</h3>--}}
    {{--</div>--}}
    {{--<div class="col-lg-5 d-sm-flex align-items-center">--}}
    {{--<div  class="input-group input-group-alternative">--}}
    {{--<div class="input-group-prepend small">--}}
    {{--<span class="input-group-text small py-0"><i class="fa fa-search"></i></span>--}}
    {{--</div>--}}
    {{--<input class="form-control form-control-sm small" name="searchkey" placeholder="Search..." autocomplete="on" type="text">--}}
    {{--</div>--}}
    {{--<a href="#!" class="btn btn-sm btn-primary ml-3 py-1">Add New Property</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="table-responsive">--}}
    {{--<!-- Projects table -->--}}
    {{--<table class="table align-items-center table-flush">--}}
    {{--<thead class="text-white bg-gradient-warning">--}}
    {{--<tr>--}}
    {{--<th scope="col">Page name</th>--}}
    {{--<th scope="col">Visitors</th>--}}
    {{--<th scope="col">Unique users</th>--}}
    {{--<th scope="col">Bounce rate</th>--}}
    {{--<th scope="col"></th>--}}
    {{--</tr>--}}
    {{--</thead>--}}
    {{--<tbody>--}}
    {{--<tr>--}}
    {{--<th scope="row">--}}
    {{--/argon/--}}
    {{--</th>--}}
    {{--<td>--}}
    {{--4,569--}}
    {{--</td>--}}
    {{--<td>--}}
    {{--340--}}
    {{--</td>--}}
    {{--<td>--}}
    {{--<i class="fas fa-arrow-up text-success mr-3"></i> 46,53%--}}
    {{--</td>--}}
    {{--<td>--}}
    {{--<li class="nav-item dropdown show">--}}
    {{--<a class="nav-link nav-link-icon" href="#" id="nav-inner-success_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">--}}
    {{--<i class="ni ni-settings-gear-65"></i>--}}
    {{--<span class="nav-link-inner--text ">Settings</span>--}}
    {{--</a>--}}
    {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="nav-inner-success_dropdown_1">--}}
    {{--<a class="dropdown-item" href="#">Action</a>--}}
    {{--<div class="dropdown-divider"></div>--}}
    {{--<a class="dropdown-item" href="#">Something else here</a>--}}
    {{--</div>--}}
    {{--</li>--}}
    {{--</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<th scope="row">--}}
    {{--/argon/--}}
    {{--</th>--}}
    {{--<td>--}}
    {{--4,569--}}
    {{--</td>--}}
    {{--<td>--}}
    {{--340--}}
    {{--</td>--}}
    {{--<td>--}}
    {{--<i class="fas fa-arrow-up text-success mr-3"></i> 46,53%--}}
    {{--</td>--}}
    {{--<td>--}}
    {{--<li class="nav-item dropdown show">--}}
    {{--<a class="nav-link nav-link-icon" href="#" id="nav-inner-success_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">--}}
    {{--<i class="ni ni-settings-gear-65"></i>--}}
    {{--<span class="nav-link-inner--text ">Settings</span>--}}
    {{--</a>--}}
    {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="nav-inner-success_dropdown_1">--}}
    {{--<a class="dropdown-item" href="#">Action</a>--}}
    {{--<div class="dropdown-divider"></div>--}}
    {{--<a class="dropdown-item" href="#">Something else here</a>--}}
    {{--</div>--}}
    {{--</li>--}}
    {{--</td>--}}
    {{--</tr>--}}
    {{--</tbody>--}}
    {{--</table>--}}
    {{--</div>--}}
    {{--<div class="card-footer">--}}
    {{--<nav aria-label="...">--}}
    {{--<ul class="pagination justify-content-end mb-0">--}}
    {{--<li class="page-item disabled">--}}
    {{--<a class="page-link" href="#" tabindex="-1">--}}
    {{--<i class="fas fa-angle-left"></i>--}}
    {{--<span class="sr-only">Previous</span>--}}
    {{--</a>--}}
    {{--</li>--}}
    {{--<li class="page-item active">--}}
    {{--<a class="page-link" href="#">1</a>--}}
    {{--</li>--}}
    {{--<li class="page-item">--}}
    {{--<a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>--}}
    {{--</li>--}}
    {{--<li class="page-item"><a class="page-link" href="#">3</a></li>--}}
    {{--<li class="page-item">--}}
    {{--<a class="page-link" href="#">--}}
    {{--<i class="fas fa-angle-right"></i>--}}
    {{--<span class="sr-only">Next</span>--}}
    {{--</a>--}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--</nav>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

@endsection
