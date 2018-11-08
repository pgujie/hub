@extends('layouts.app')
@section('content')

    <style>
        .card-img-overlay{
            background: linear-gradient(to right, rgba(0,0,0,0.95),  rgba(0,0,0,0.5) ); !important;
            top:auto !important
        }

    </style>

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
            <div class="container py-lg-md d-flex">
                <div class="col px-0">
                    <div class="row">
                        <div class="col-lg-6">
                            <h1 class="display-3  text-white">Off Campus Accommodation
                                <span>for tertiary level students</span>
                                <small>in <strong>Zimbabwe</strong></small>
                            </h1>
                            <p class="lead  text-white">Housing made <strong>EASY</strong> </p>
                            <div class="btn-wrapper">
                                <a href="#start" class="btn btn-danger btn-icon mb-3 mb-sm-0">
                                    <span class="btn-inner--icon"><i class="fa fa-try"></i></span>
                                    <span class="btn-inner--text">Take a tour</span>
                                </a>

                                @if(auth()->check())

                                    <a href="/properties/normal-view" class="btn btn-white btn-icon mb-3 mb-sm-0" >
                                        <span class="btn-inner--icon"><i class="fa fa-check"></i></span>
                                        <span class="btn-inner--text">View Our Properties</span>
                                    </a>

                                    @else

                                    <a href="/register" class="btn btn-white btn-icon mb-3 mb-sm-0" >
                                        <span class="btn-inner--icon"><i class="fa fa-check"></i></span>
                                        <span class="btn-inner--text">Ummm i think i like it?</span>
                                    </a>

                                @endif


                            </div>
                        </div>
                        <div class="col-lg-6 mb-lg-auto">
                            <div class="rounded shadow-lg overflow-hidden transform-perspective-right">
                                <div id="carousel_example" class="carousel slide" data-ride="true" data-interval="2000">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel_example" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel_example" data-slide-to="1"></li>
                                    </ol>

                                    {{--Slide--}}

                                    <div class="carousel-inner">

                                        @foreach( $slider_properties as $key => $property )

                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                <img class="img-fluid card-img" src="{{ $property->thumbnails[0]->path }}" alt="Second slide">
                                                <div class="card-img-overlay text-white">
                                                    <h5 class="card-title text-white">{{ $property->location->city }} - {{ $property->location->suburb }}</h5>
                                                    <p class="card-text pb-3 d-flex flex-column">
                                                        <span class="cad-text">Agent: {{ $property->agent->full_name }}</span>
                                                        <small class="card-text">{{ $property->rooms_available }} Rooms available</small>
                                                        <small class="card-text">{{ $property->description }}</small>
                                                        <small class="card-text">Last updated {{ $property->updated_at->diffForHumans() }}</small>
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SVG separator -->
            <div class="separator separator-bottom separator-skew">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </section>
        <!-- 1st Hero Variation -->
    </div>
    <section id="start" class="section mt--200">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="row row-grid">
                        <div class="col-lg-4">
                            <div class="card card-lift--hover shadow border-0">
                                <div class="card-body py-5">
                                    <div class="icon icon-shape icon-shape-warning rounded-circle mb-4">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <h6 class="text-primary text-uppercase">Get a house to rent</h6>
                                    <p class="description mt-3">...a capable system that will link you with the best accommodation available in an area of your own choosing.</p>
                                    <div>
                                        <span class="badge badge-pill badge-warning">you</span>
                                        <i class="fa fa-star"></i>
                                        <span class="badge badge-pill badge-warning">us</span>
                                        <i class="fa fa-star"></i>
                                        <span class="badge badge-pill badge-warning">landlord</span>
                                    </div>
                                    <a href="#" class="btn btn-warning mt-4">Learn more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-lift--hover shadow border-0">
                                <div class="card-body py-5">
                                    <div class="icon icon-shape icon-shape-success rounded-circle mb-4">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <h6 class="text-success text-uppercase">Get a job</h6>
                                    <p class="description mt-3">...made possible by a dedicated team that is very welcome to anyone who wants to be a part of this great innovation.</p>
                                    <div>
                                        <span class="badge badge-pill badge-success">agents</span>
                                        <span class="badge badge-pill badge-success">provincial officers</span>
                                    </div>
                                    <a href="#" class="btn btn-success mt-4">Join the team</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-lift--hover shadow border-0">
                                <div class="card-body py-5">
                                    <div class="icon icon-shape icon-shape-info rounded-circle mb-4">
                                        <i class="fa fa-users"></i>
                                    </div>
                                    <h6 class="text-info text-uppercase">Get student tenants</h6>
                                    <p class="description mt-3">also facilitates landlords that have homes that they need occupied by students</p>
                                    <div>
                                        <span class="badge badge-pill badge-info">marketing</span>
                                        <span class="badge badge-pill badge-info">get cash</span>
                                        <span class="badge badge-pill badge-info">relax</span>
                                    </div>
                                    <a href="#" class="btn btn-info mt-4">Learn more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-3">
        <div class="container">
            <div class="row justify-content-center text-center px-5 pb-3">
                <p class="lead text-muted">According to the National Oceanic and Atmospheric Administration, Ted, Scambos, NSIDClead scentist, puts the potentially record maximum.</p>
            </div>
            <div class="card card bg-white border-0">
                <div class="card-header bg-gradient-warning text-white shadow-sm rounded d-inline-block text-primary d-flex">
                    <i class="ni ni-bullet-list-67 d-inline p-2"></i>
                    <h5 class="pl-2 text-white ">Listed properties</h5>
                    <a href="#" class="text-white ml-auto p-2">View More</a>
                </div>

                <div class="card-body py-5 px-3">
                    <div class="row justify-content-center">
                        @foreach($listed_properties as $property)


                            <div class="p-2 col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="p-0 border-0 shadow-lg">
                                    <img style="border-radius: 0;max-height: 200px;min-height: 150px"  class="card-img-top h-50" src="{{ $property->thumbnails[0]->path  }}" alt="Card image cap">
                                    <div class="p-3">
                                        <div class=" p-0">
                                            <h5 class="text-center">
                                                {{ $property->location->city }} - {{ $property->location->suburb }}
                                            </h5>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="card-profile-stats d-flex justify-content-center">
                                                        <div class="d-flex flex-column justify-content-center align-content-center m-2">
                                                            <span class="heading text-center">{{ $property->rooms_count }}</span>
                                                            <strong class="bold">Rooms</strong>
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center align-content-center m-2">
                                                            <span class="heading text-center">{{ $property->rooms_available }}</span>
                                                            <strong class="bold">Available</strong>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-text text-center">
                                                Agent : {{ $property->agent->full_name }}
                                            </div>
                                            <div class="text-center">
                                                <div>
                                                     {{ $property->description }}
                                                </div>
                                                <hr class="my-3 bold">
                                                <a href="/property/normal-view/{{ $property->id }}">Show more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                    <div class="col-lg-12 pt-5 d-flex justify-content-center">
                        {{ $listed_properties->appends(request()->query())->links()  }}
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="py-3">
        <div class="container">
            <div class="row justify-content-center text-center px-5 pb-3">
                <p class="lead text-muted">According to the National Oceanic and Atmospheric Administration, Ted, Scambos, NSIDClead scentist, puts the potentially record maximum.</p>
            </div>

            <div class="card card bg-white border-0">

                <div class="card-header bg-gradient-warning text-white shadow-sm rounded d-inline-block text-primary d-flex">
                    <i class="ni ni-bullet-list-67 d-inline p-2"></i>
                    <h5 class="pl-2 text-white ">Un-Listed properties</h5>
                    <a href="#" class="text-white ml-auto p-2">View More</a>
                </div>

                <div class="card-body py-5 px-3">
                    <div class="row justify-content-center">
                        @foreach($un_listed as $property)


                            <div class="p-2 col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                <div class="p-0 border-0 shadow-lg">
                                    <img style="border-radius: 0;max-height: 200px;min-height: 150px"  class="card-img-top h-50" src="{{ $property->thumbnails[0]->path  }}" alt="Card image cap">
                                    <div class="p-3">
                                        <div class=" p-0">
                                            <h5 class="text-center">
                                                {{ $property->location->city }} - {{ $property->location->suburb }}
                                            </h5>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="card-profile-stats d-flex justify-content-center">
                                                        <div class="d-flex flex-column justify-content-center align-content-center m-2">
                                                            <span class="heading text-center">{{ $property->rooms_count }}</span>
                                                            <strong class="bold">Rooms</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <div>
                                                    {{ $property->description }}
                                                </div>
                                                <hr class="my-3 bold">
                                                <a href="/property/normal-view/{{ $property->id }}">Show more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                    <div class="col-lg-12 d-flex p-5 justify-content-center">
                        {{ $un_listed->appends(request()->query())->links()  }}
                    </div>
                </div>
            </div>

        </div>
    </section>


@endsection