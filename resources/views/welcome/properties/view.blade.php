@extends('layouts.app')
@section('content')

    <style>
        .card-profile-image
        {
            position: relative;
        }
        .card-profile-image img
        {
            position: absolute;
            left: 50%;
            max-width: 400px;
            min-width: 150px;
            max-height: 230px;
            transition: all .15s ease;
            transform: translate(-50%, -30%);

            border-radius: 0rem;
            z-index: 999;
        }
        .card-profile-image img:hover
        {
            transform: translate(-50%, -33%);
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
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <h1>Quick Search</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus fugiat minus optio vero. Et maxime ratione sed veritatis voluptas. Doloremque dolorum expedita illum iure molestiae quae quidem quo. Deserunt, quaerat.</p>
                        </div>
                        <div class="col-lg-5 ">
                            <div class="card bg-secondary shadow border-0 p-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select class="form-control form-control-alternative" name="gender" id="">
                                                <option value="">Choose Gender</option>
                                                <option value="all">Male or Femail</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-alternative" id="exampleFormControlInput1" placeholder="Min Price">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-alternative" id="exampleFormControlInput1" placeholder="Max Price">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-alternative" id="exampleFormControlInput1" placeholder="Min Occupants">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-alternative" id="exampleFormControlInput1" placeholder="Max Occupants">
                                        </div>
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-center">
                                        <button class="btn btn-warning">Check Rooms</button>
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
    <section class="mt--300 px-2 pt-0 pb-5">
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-xl-5 mb-5 ">
                    <div class="card card-profile shadow">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 order-lg-2">
                                <div class="card-profile-image">
                                    <a href="#">
                                        <img src="{{ asset($property->thumbnails[0]->path)  }}">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                            <div class="d-flex justify-content-between py-5">
                                {{--<a href="#" class="btn btn-sm btn-info mr-4">Connect</a>--}}
                                {{--<a href="#" class="btn btn-sm btn-default float-right">Message</a>--}}
                            </div>
                        </div>
                        <div class="card-body pt-0 pt-md-4">
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


                                        <div class="d-flex flex-column justify-content-center align-content-center m-2">
                                            <span class="heading text-center">{{ $property->rating }}</span>
                                            <strong class="bold">Rating</strong>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-text border-bottom py-3 text-center">
                                <strong>Agent</strong><br>
                                {{ $property->agent->full_name }} <br>
                                {{ $property->agent->phone }} <br>
                                {{ $property->agent->email }} <br>
                            </div>
                            <div class="text-center pt-4">
                                <h3>
                                    {{ $property->location->city }} - {{ $property->location->suburb }}
                                </h3>
                                <hr class="my-4">
                                <p>  {{ $property->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="card shadow">
                        <div class="card-header bg-white">
                            <h2 class="text-center">Rooms</h2>
                        </div>
                        <div class="card-body">
                            @foreach( $rooms as $room )

                                <div>
                                    <div  class="row p-0">
                                        <div class="col-lg-5 col-sm-12">
                                            <img src="{{ asset($room->thumbnails[0]->path)  }}" style="border-radius: 0;max-height: 200px;min-height: 150px"  class="card-img  h-100  shadow p-0" alt="">
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="bold text-center">
                                                <div class="bold">{{ $room->room_type }}</div>
                                                <div><strong>Room Type</strong></div>
                                            </div>
                                            <div class="col">
                                                <div class="card-profile-stats d-flex justify-content-center">
                                                    <div class="d-flex flex-column justify-content-center align-content-center m-2">
                                                        <span class="heading text-center">{{ $room->number_of_occupants }}</span>
                                                        <strong class="bold">Occupants</strong>
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center align-content-center m-2">
                                                        <span class=" text-center">{{ ucwords($room->gender) }}</span>
                                                        <strong class="bold">Gender</strong>
                                                    </div>

                                                    <div class="d-flex flex-column justify-content-center align-content-center m-2">
                                                        <span class="heading text-center">{{ $room->rating }}</span>
                                                        <strong class="bold">Rating</strong>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card-profile-stats d-flex justify-content-center">
                                                    <div class="d-flex flex-column justify-content-center align-content-center m-2">
                                                        <span class="heading text-center">{{ $room->price }}</span>
                                                        <strong class="bold">Price</strong>
                                                    </div>

                                                    <div class="d-flex flex-column justify-content-center align-content-center m-2">
                                                        <div class="heading text-center">
                                                            @if( $property->type == 'listed' )

                                                                @if($room->state)
                                                                    <span class="badge badge-warning">Fully Booked</span>
                                                                @else
                                                                    <span class="badge badge-success">Vacant</span>
                                                                @endif
                                                            @else
                                                                <span class="badge badge-warning">Not Available</span>
                                                            @endif

                                                        </div>
                                                        <strong class="bold">State of Room</strong>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <span>{{ $room->description }}</span>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                @if( $property->type == 'listed' )

                                                    @if(auth()->check())
                                                        @if( !$room->user_booked )
                                                            @if(!$room->fully_booked)
                                                                <a href="/request/book-room/{{ $room->id }}">Book</a>
                                                            @else
                                                                <span class="card-text text-danger text-center bold"> Fully booked</span>
                                                            @endif
                                                        @else
                                                            <a href="/request/cancel-room/{{ $room->id }}">Cancel</a>
                                                        @endif
                                                    @else
                                                        <p class="card-text p-1 text-center bold">Please <a href="/login">log in </a> or <a href="/register">Register</a> to book </p>
                                                    @endif

                                                @else

                                                    <p class="card-text text-info">Property is not valaible for booking</p>

                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <hr class="">
                                </div>

                            @endforeach
                            <div class="row justify-content-center">
                                {{ $rooms->appends(request()->query())->links()  }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection