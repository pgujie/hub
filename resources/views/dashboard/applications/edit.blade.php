@extends('layouts.dashboard',[ 'title' => 'Properties' ])
@section('content')

    <div class="header bg-gradient-warning  pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row">

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--9">
        <div class="row mt-5">
            <div class="col-xl-7 mb-5 ">
                    <div class="card shadow">
                        <div class="card-header bg-white">
                            <h2 class="text-center">Application Details</h2>
                        </div>
                        <div class="card-body">
                            <div  class="row p-0">
                                <div class="col-lg-6 col-sm-12">
                                    <h4>Request Data</h4>
                                        <span class="text-muted"> Application ID : </span> {{ $request->id }} <br>
                                        <span class="text-muted">Date Applied : </span> {{ $request->created_at }} <br>
                                        <span class="text-muted">Date Start : </span> {{ $request->start_date }} <br>
                                        <span class="text-muted">Date End : </span> {{ $request->end_date }} <br>
                                        <span class="text-muted">Amount : </span>{{ $request->balance }} <br>
                                        <span class="text-muted">State : </span>
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
                                <div class="col-lg-6 col-sm-12">
                                    <h4>User Info</h4>
                                        <span class="text-muted">Name : </span>{{ $request->user->full_name  }} <br>
                                        <span class="text-muted">Phone : </span>{{ $request->user->phone  }} <br>
                                        <span class="text-muted">Email : </span>{{ $request->user->email  }} <br>

                                </div>

                            </div>
                        </div>
                        <div  class="card-header bg-white border-top">
                            <h2 class="text-center">Room Info</h2>
                        </div>
                        <div class="card-body">
                                <div  class="row p-0">
                                    <div class="col-lg-5 col-sm-12">
                                        <img src="{{ asset($request->room->thumbnails[0]->path)  }}" style="border-radius: 0;max-height: 200px;min-height: 150px"  class="card-img  h-100  shadow p-0" alt="">
                                    </div>
                                    <div class="col-lg-7 col-sm-12">
                                        <div class="bold text-center">
                                            <div class="bold">{{ $request->room->created_at }}</div>
                                            <div><strong>Created at</strong></div>
                                        </div>
                                        <div class="bold text-center">
                                            <div class="bold">{{ $request->room->room_type }}</div>
                                            <div><strong>Room Type</strong></div>
                                        </div>
                                        <div class="col">
                                            <div class="card-profile-stats d-flex justify-content-center p-0">
                                                <div class="d-flex flex-column justify-content-center align-content-center">
                                                    <span class="heading text-center">{{ $request->room->number_of_occupants }}</span>
                                                    <strong class="bold">Occupants</strong>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center align-content-center">
                                                    <span class="heading text-center">{{ $request->room->occupants_left }}</span>
                                                    <strong class="bold">Left</strong>
                                                </div>

                                                <div class="d-flex flex-column justify-content-center align-content-center">
                                                    <span class="heading text-center">{{ $request->room->rating }}</span>
                                                    <strong class="bold">Rating</strong>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card-profile-stats d-flex justify-content-center p-0">
                                                <div class="d-flex flex-column justify-content-center align-content-center">
                                                    <span class="heading text-center">{{ $request->room->price }}</span>
                                                    <strong class="bold">Price</strong>
                                                </div>

                                                <div class="d-flex flex-column justify-content-center align-content-center">
                                                    <span class=" text-center">{{ ucwords($request->room->gender) }}</span>
                                                    <strong class="bold">Gender</strong>
                                                </div>

                                                <div class="d-flex flex-column justify-content-center align-content-center">
                                                    <div class="heading text-center">

                                                            @if($request->room->state)
                                                                <span class="badge badge-warning">Fully Booked</span>
                                                            @else
                                                                <span class="badge badge-success">Vacant</span>
                                                            @endif

                                                    </div>
                                                    <strong class="bold">State of Room</strong>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <span>{{ $request->room->description }}</span>
                                        </div>
                                        <div class="d-flex justify-content-center">

                                        </div>
                                    </div>

                                </div>
                            </div>
                    </div>
            </div>
            <div class="col-lg-5 px-0">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-header bg-white pb-2">
                        <div class="text-muted text-center mb-3">
                            <h5> Application  </h5>
                        </div>
                    </div>
                    @if( Session::has('message') )
                        <div class="alert alert-success alert-dismissible fade show text-center" style="border-radius: 0" role="alert">
                            <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                            <span class="alert-inner--text"><strong> Success! </strong> {{ Session::get('message') }}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card-body p-3 pr-5">

                        <form action="/applications/{{ $request->id }}/accept" method="POST">

                            @csrf

                            <h6 class="heading-small text-muted mb-4">Application Information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Start Date</label>
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input class="form-control datepicker" name="start_date" placeholder="dd/mm/yyyy"  type="text" value="{{ old('start_date',$request->start_date->format('d/m/Y')) }}">
                                            </div>
                                            @if($errors->has('start_date'))
                                                <div class="text-warning small">
                                                    <strong>{{ $errors->first('start_date') }} </strong>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">End Date</label>
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input class="form-control datepicker" name="end_date" placeholder="dd/mm/yyyy"  type="text" value="{{  old('start_date',$request->end_date->format('d/m/Y')) }}">
                                            </div>
                                            @if($errors->has('end_date'))
                                                <div class="text-warning small">
                                                    <strong>{{ $errors->first('end_date') }} </strong>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 row justify-content-center">
                                        <div class="form-group">
                                            <div class="custom-control custom-radio mb-3">
                                                <input name="choice" class="custom-control-input" value="1" id="customRadio6" checked  type="radio">
                                                <label class="custom-control-label" for="customRadio6">Accept Application</label>
                                            </div>
                                            <div class="custom-control custom-radio mb-3">
                                                <input name="choice" class="custom-control-input" value="4" id="customRadio7"  type="radio">
                                                <label class="custom-control-label" for="customRadio7">Reject Application</label>
                                            </div>
                                            @if($errors->has('choice'))
                                                <div class="text-warning small">
                                                    <strong>{{ $errors->first('choice') }} </strong>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <!-- Description -->
                            <div class="">
                                <div class="row justify-content-center">
                                    <button type="submit" class="btn btn-warning">Save Application</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>

@endsection
