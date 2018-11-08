@extends('layouts.dashboard',[ 'title' => 'Properties' ])
@section('content')

    <div class="header bg-gradient-warning  pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row">
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Traffic</h5>
                                        <span class="h2 font-weight-bold mb-0">350,897</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                            <i class="fas fa-chart-bar"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                                        <span class="h2 font-weight-bold mb-0">2,356</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                            <i class="fas fa-chart-pie"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                                    <span class="text-nowrap">Since last week</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                                        <span class="h2 font-weight-bold mb-0">924</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                                    <span class="text-nowrap">Since yesterday</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                                        <span class="h2 font-weight-bold mb-0">49,65%</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                            <i class="fas fa-percent"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--8">
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <h3 class="mb-0">Applications</h3>
                            </div>
                            <div class="col-lg-5 d-sm-flex align-items-center">
                                    <div  class="input-group input-group-alternative">
                                        <div class="input-group-prepend small">
                                            <span class="input-group-text small py-0"><i class="fa fa-search"></i></span>
                                        </div>
                                        <input class="form-control form-control-sm small" name="searchkey" placeholder="Search..." autocomplete="on" type="text">
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="text-white bg-gradient-warning">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Property</th>
                                <th scope="col">Room</th>
                                <th scope="col">User</th>
                                <th scope="col" >Info</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($requests as $request )

                                <tr>
                                    <th scope="row">
                                       <strong>{{ $request->id }}</strong>
                                    </th>
                                    <th scope="row">
                                        <span class="text-muted">ID : </span>{{ $request->room->property->id }} <br>
                                        <span class="text-muted">Suburb : </span>{{ $request->room->property->location->suburb }} <br>
                                        <span class="text-muted">City : </span>{{ $request->room->property->location->city }} <br>
                                    </th>
                                    <th scope="row">
                                        <span class="text-muted">ID : </span>{{ $request->room->id }} <br>
                                        <span class="text-muted">Type : </span>{{ $request->room->room_type }} <br>
                                        <span class="text-muted">Gender : </span>{{ $request->room->gender }} <br>
                                    </th>
                                    <td>
                                        <span class="text-muted">Name : </span>{{ $request->user->full_name  }} <br>
                                        <span class="text-muted">Phone : </span>{{ $request->user->phone  }} <br>
                                        <span class="text-muted">Email : </span>{{ $request->user->email  }} <br>
                                    </td>
                                    <td class="">
                                        <div> <span class="text-muted">Amount : </span>{{ $request->balance }}</div>
                                        <div> <span class="text-muted">Date : </span>{{ $request->created_at }}</div>
                                        <div>  <span class="text-muted">State : </span>
                                           @if( $request->state == 0 )
                                               <span class="badge badge-warning">Pending</span>
                                               @elseif( $request->state == 1 )
                                                <span class="badge badge-success">Accepted</span>
                                            @elseif( $request->state == 3 )
                                                <span class="badge badge-info">Cancelled</span>
                                               @elseif( $request->state == 3 )
                                                <span class="badge badge-danger">Denied</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a class="nav-link nav-link-icon text-success" href="/applications/{{ $request->id }}/accept">
                                            <i class="fa fa-check"></i>
                                            <span class="nav-link-inner--text ">Open</span>
                                        </a>
                                        <a class="nav-link nav-link-icon text-danger" href="/applications/{{ $request->id }}/reject">
                                            <i class="fa fa-trash"></i>
                                            <span class="nav-link-inner--text ">Reject</span>
                                        </a>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        {{ $requests->appends(request()->query())->links()  }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
