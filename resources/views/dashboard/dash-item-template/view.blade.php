@extends('layouts.dashboard',[ 'title' => 'Properties' ])
@section('content')

    <div class="header bg-gradient-warning  pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row">
                    {{--<div class="col-xl-3 col-lg-6">--}}
                        {{--<div class="card card-stats mb-4 mb-xl-0">--}}
                            {{--<div class="card-body">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col">--}}
                                        {{--<h5 class="card-title text-uppercase text-muted mb-0">Traffic</h5>--}}
                                        {{--<span class="h2 font-weight-bold mb-0">350,897</span>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-auto">--}}
                                        {{--<div class="icon icon-shape bg-danger text-white rounded-circle shadow">--}}
                                            {{--<i class="fas fa-chart-bar"></i>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<p class="mt-3 mb-0 text-muted text-sm">--}}
                                    {{--<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>--}}
                                    {{--<span class="text-nowrap">Since last month</span>--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-xl-3 col-lg-6">--}}
                        {{--<div class="card card-stats mb-4 mb-xl-0">--}}
                            {{--<div class="card-body">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col">--}}
                                        {{--<h5 class="card-title text-uppercase text-muted mb-0">New users</h5>--}}
                                        {{--<span class="h2 font-weight-bold mb-0">2,356</span>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-auto">--}}
                                        {{--<div class="icon icon-shape bg-warning text-white rounded-circle shadow">--}}
                                            {{--<i class="fas fa-chart-pie"></i>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<p class="mt-3 mb-0 text-muted text-sm">--}}
                                    {{--<span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>--}}
                                    {{--<span class="text-nowrap">Since last week</span>--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-xl-3 col-lg-6">--}}
                        {{--<div class="card card-stats mb-4 mb-xl-0">--}}
                            {{--<div class="card-body">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col">--}}
                                        {{--<h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>--}}
                                        {{--<span class="h2 font-weight-bold mb-0">924</span>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-auto">--}}
                                        {{--<div class="icon icon-shape bg-yellow text-white rounded-circle shadow">--}}
                                            {{--<i class="fas fa-users"></i>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<p class="mt-3 mb-0 text-muted text-sm">--}}
                                    {{--<span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>--}}
                                    {{--<span class="text-nowrap">Since yesterday</span>--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-xl-3 col-lg-6">--}}
                        {{--<div class="card card-stats mb-4 mb-xl-0">--}}
                            {{--<div class="card-body">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col">--}}
                                        {{--<h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>--}}
                                        {{--<span class="h2 font-weight-bold mb-0">49,65%</span>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-auto">--}}
                                        {{--<div class="icon icon-shape bg-info text-white rounded-circle shadow">--}}
                                            {{--<i class="fas fa-percent"></i>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<p class="mt-3 mb-0 text-muted text-sm">--}}
                                    {{--<span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>--}}
                                    {{--<span class="text-nowrap">Since last month</span>--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--9">
        <div class="row mt-5">
            <div class="col-xl-5 mb-5 ">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="../assets/img/theme/team-4-800x800.jpg" class="square">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                            <a href="#" class="btn btn-sm btn-default float-right">Message</a>
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    <div>
                                        <span class="heading">22</span>
                                        <span class="description">Friends</span>
                                    </div>
                                    <div>
                                        <span class="heading">10</span>
                                        <span class="description">Photos</span>
                                    </div>
                                    <div>
                                        <span class="heading">89</span>
                                        <span class="description">Comments</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                Jessica Jones<span class="font-weight-light">, 27</span>
                            </h3>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>Bucharest, Romania
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>University of Computer Science
                            </div>
                            <hr class="my-4">
                            <p>Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.</p>
                            <a href="#">Show more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7">
                 <div class="card shadow">
                     <div class="card-header">
                         <h2>Rooms</h2>
                     </div>
                     <div class="card-body">
                         <div>
                             <div  class="row p-0">
                                 <div class="col-lg-5 col-sm-12">
                                     <img src="./assets/img/theme/img-1-1200x1000.jpg" class="card-img  h-100  shadow p-0" alt="">
                                 </div>
                                 <div class="col-lg-6 col-sm-12">
                                     <div class="card-profile-stats d-flex justify-content-center py-0">
                                         <div>
                                             <span class="heading">22</span>
                                             <span class="description">Friends</span>
                                         </div>
                                         <div>
                                             <span class="heading">10</span>
                                             <span class="description">Photos</span>
                                         </div>
                                         <div>
                                             <span class="heading">89</span>
                                             <span class="description">Comments</span>
                                         </div>
                                     </div>
                                     <div class="text-center">
                                         <h3>Jessica Jones<span class="font-weight-light">, 27</span></h3>
                                     </div>
                                     <div class="d-flex justify-content-center py-2">
                                         <span class="badge badge-success">WIFI </span>
                                     </div>
                                     <div class="d-flex justify-content-center py-2">
                                         <a href="">Book Now</a>
                                     </div>
                                 </div>

                             </div>
                             <hr class="">
                         </div>
                         <div>
                             <div  class="row p-0">
                                 <div class="col-lg-5 col-sm-12">
                                     <img src="./assets/img/theme/img-1-1200x1000.jpg" class="card-img  h-100  shadow p-0" alt="">
                                 </div>
                                 <div class="col-lg-6 col-sm-12">
                                     <div class="card-profile-stats d-flex justify-content-center py-0">
                                         <div>
                                             <span class="heading">22</span>
                                             <span class="description">Friends</span>
                                         </div>
                                         <div>
                                             <span class="heading">10</span>
                                             <span class="description">Photos</span>
                                         </div>
                                         <div>
                                             <span class="heading">89</span>
                                             <span class="description">Comments</span>
                                         </div>
                                     </div>
                                     <div class="text-center">
                                         <h3>Jessica Jones<span class="font-weight-light">, 27</span></h3>
                                     </div>
                                     <div class="d-flex justify-content-center py-2">
                                         <span class="badge badge-success">WIFI </span>
                                     </div>
                                     <div class="d-flex justify-content-center py-2">
                                         <a href="">Book Now</a>
                                     </div>
                                 </div>

                             </div>
                             <hr class="">
                         </div>

                         <div>
                             <nav aria-label="...">
                                 <ul class="pagination justify-content-center mb-0">
                                     <li class="page-item disabled">
                                         <a class="page-link" href="#" tabindex="-1">
                                             <i class="fas fa-angle-left"></i>
                                             <span class="sr-only">Previous</span>
                                         </a>
                                     </li>
                                     <li class="page-item active">
                                         <a class="page-link" href="#">1</a>
                                     </li>
                                     <li class="page-item">
                                         <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                     </li>
                                     <li class="page-item"><a class="page-link" href="#">3</a></li>
                                     <li class="page-item">
                                         <a class="page-link" href="#">
                                             <i class="fas fa-angle-right"></i>
                                             <span class="sr-only">Next</span>
                                         </a>
                                     </li>
                                 </ul>
                             </nav>
                         </div>

                     </div>

                 </div>
            </div>
        </div>
    </div>

@endsection
