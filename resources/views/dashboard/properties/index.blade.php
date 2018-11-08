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
                                <h3 class="mb-0">Properties</h3>
                            </div>
                            <div class="col-lg-5 d-sm-flex align-items-center">
                                    <div  class="input-group input-group-alternative">
                                        <div class="input-group-prepend small">
                                            <span class="input-group-text small py-0"><i class="fa fa-search"></i></span>
                                        </div>
                                        <input class="form-control form-control-sm small" name="searchkey" placeholder="Search..." autocomplete="on" type="text">
                                    </div>
                                <a href="properties/add-form" class="btn btn-sm btn-primary ml-3 py-1 shadow-lg">Add New Property</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="text-white bg-gradient-warning">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Location</th>
                                <th scope="col">Agent</th>
                                <th scope="col" class="">Info</th>
                                <th scope="col" class="text-center">No Rooms</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($properties as $property )
                            <tr>
                                <th scope="row">
                                    {{ $property->id }}
                                </th>
                                <th scope="row">
                                    {{ $property->location->city }} - {{ $property->location->suburb }} <br>
                                    <span class="text-muted">{{ $property->location->province }}</span>
                                </th>
                                <td>
                                    <div><a href="">{{ $property->agent->full_name }}</a></div>
                                    <div>{{ $property->agent->phone }}</div>
                                    <div>{{ $property->agent->email }}</div>
                                </td>
                                <td class="">
                                    <span class="text-muted">ID : </span>{{ $property->id }} <br>
                                    <span class="text-muted">Rating : </span>{{ $property->rating }} <br>
                                    <span class="text-muted">Created : </span>{{ $property->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $property->rooms_count }} <br>
                                    <a class="nav-link nav-link-icon" href="/rooms/{{ $property->id }}/view" >
                                        <i class="fa fa-eye"></i>
                                        <span class="nav-link-inner--text ">View Rooms</span>
                                    </a>
                                    <a class="nav-link nav-link-icon" href="rooms/{{ $property->id }}/add" >
                                        <i class="fa fa-plus-circle"></i>
                                        <span class="nav-link-inner--text ">Add Room</span>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a class="nav-link nav-link-icon" href="/properties/dash-view/edit/{{ $property->id }}" >
                                        <i class="fa fa-edit"></i>
                                        <span class="nav-link-inner--text ">Edit</span>
                                    </a>
                                    <a class="nav-link nav-link-icon" href="/rooms/{{ $property->id }}/view" >
                                        <i class="fa fa-file-contract"></i>
                                        <span class="nav-link-inner--text ">View Contracts</span>
                                    </a>
                                    <a class="nav-link nav-link-icon" href="/rooms/{{ $property->id }}/view" >
                                        <i class="fa fa-paperclip"></i>
                                        <span class="nav-link-inner--text ">View Applications</span>
                                    </a>

                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        {{ $properties->appends(request()->query())->links()  }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
