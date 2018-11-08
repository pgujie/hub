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
            <div class="container-fluid row p-5">
                <div class="col-lg-7">
                    <div class="card shadow">
                        <div class="card-header bg-white">
                            <h2 class="text-center">Room</h2>
                        </div>
                        <div class="card-body">
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

                                                        @if( $room->property->type == 'listed' )

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
                                    </div>

                                </div>
                                <hr class="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card bg-secondary shadow border-0 ">
                        <div class="card-header bg-white">
                            <h2 class="text-center">Room</h2>
                        </div>
                        <div class="card-body p-4">
                            <form action="/request/book-room/{{ $room->id }}/accept" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Start Date</label>
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input class="form-control datepicker" name="start_date" placeholder="dd/mm/yyyy"  type="text" value="{{ old('start_date') }}">
                                            </div>
                                            @if($errors->has('start_date'))
                                            <div class="text-warning small">
                                                <strong>{{ $errors->first('start_date') }} </strong>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">End Date</label>
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input class="form-control datepicker" name="end_date" placeholder="dd/mm/yyyy"  type="text" value="{{ old('end_date') }}">
                                            </div>
                                            @if($errors->has('end_date'))
                                                <div class="text-warning small">
                                                    <strong>{{ $errors->first('end_date') }} </strong>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-center pt-3">
                                        <button type="submit" class="btn btn-warning">Make Booking</button>
                                    </div>
                                </div>
                            </form>
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

            </div>
        </div>
    </section>




@endsection

@section('scripts')

    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>

@endsection