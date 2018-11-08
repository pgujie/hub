@extends('layouts.app')

@section('content')

    <div class="position-relative">
        <!-- shape Hero -->
        <section class="section section-lg section-shaped pb-250">
            <div class="shape shape-style-1 shape-default">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="container justify-content-center py-lg-md d-flex">
                <div class="col-lg-5 px-0">

                    <div class="card bg-secondary shadow border-0">
                        <div class="card-header bg-white py-3">
                            <div class="btn-wrapper text-center">
                                <h5>Login</h5>
                            </div>
                        </div>
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <small>Sign in to the Housing Hub</small>
                            </div>
                            <form method="POST" action="{{ route('login') }}">

                                @csrf

                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                        </div>
                                        <input placeholder="Email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus/>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                           </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input placeholder="Password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required />
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                             <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} >
                                    <label class="custom-control-label" for="remember">
                                        <span>Remember me</span>
                                    </label>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">Sign in</button>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <a href="{{ route('password.request') }}" class="text-light">
                                            <small>Forgot password?</small>
                                        </a>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href="{{ route('register') }}" data-toggle="modal" data-target="#signup-form" class="text-light" data-dismiss="modal">
                                            <small>Create new account</small>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- 1st Hero Variation -->
    </div>

@endsection
