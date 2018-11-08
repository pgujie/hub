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

                                <form>
                                    <h6 class="heading-small text-muted mb-4">User information</h6>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="input-username">Username</label>
                                                    <input id="input-username" class="form-control form-control-alternative" placeholder="Username" value="lucky.jesse" type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">Email address</label>
                                                    <input id="input-email" class="form-control form-control-alternative" placeholder="jesse@example.com" type="email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="input-first-name">First name</label>
                                                    <input id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="Lucky" type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="input-last-name">Last name</label>
                                                    <input id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="Jesse" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <!-- Address -->
                                    <h6 class="heading-small text-muted mb-4">Contact information</h6>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="input-address">Address</label>
                                                    <input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="input-city">City</label>
                                                    <input id="input-city" class="form-control form-control-alternative" placeholder="City" value="New York" type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="input-country">Country</label>
                                                    <input id="input-country" class="form-control form-control-alternative" placeholder="Country" value="United States" type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-country">Postal code</label>
                                                    <input id="input-postal-code" class="form-control form-control-alternative" placeholder="Postal code" type="number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <!-- Description -->
                                    <h6 class="heading-small text-muted mb-4">About me</h6>
                                    <div class="pl-lg-4">
                                        <div class="form-group focused">
                                            <label>About Me</label>
                                            <textarea rows="4" class="form-control form-control-alternative" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
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
