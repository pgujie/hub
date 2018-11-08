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
                                <span class="text-muted">Application ID : </span> {{ $contract->id }} <br>
                                <span class="text-muted">Date Applied : </span> {{ $contract->created_at }} <br>
                                <span class="text-muted">Date Start : </span> {{ $contract->start_date }} <br>
                                <span class="text-muted">Date End : </span> {{ $contract->end_date }} <br>
                                <span class="text-muted">Balance : </span>{{ $contract->balance }} <br>
                                <span class="text-muted">Amount : </span>{{ $contract->amount }} <br>
                                <span class="text-muted">State : </span>
                                @if( $contract->state == 0 )
                                    <span class="badge badge-success">Valid</span>
                                @elseif( $contract->state == 1 )
                                    <span class="badge badge-danger">Expired</span>
                                @elseif( $contract->state == 3 )
                                    <span class="badge badge-warning">Cancelled</span>
                                @endif
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <h4>User Info</h4>
                                <span class="text-muted">Name : </span>{{ $contract->user->full_name  }} <br>
                                <span class="text-muted">Phone : </span>{{ $contract->user->phone  }} <br>
                                <span class="text-muted">Email : </span>{{ $contract->user->email  }} <br>

                            </div>

                        </div>
                    </div>
                    <div  class="card-header bg-white border-top">
                        <h2 class="text-center">Room Info</h2>
                    </div>
                    <div class="card-body">
                        <div  class="row p-0">
                            <div class="col-lg-5 col-sm-12">
                                <img src="{{ asset($contract->room->thumbnails[0]->path)  }}" style="border-radius: 0;max-height: 200px;min-height: 150px"  class="card-img  h-100  shadow p-0" alt="">
                            </div>
                            <div class="col-lg-7 col-sm-12">
                                <div class="bold text-center">
                                    <div class="bold">{{ $contract->room->created_at }}</div>
                                    <div><strong>Created at</strong></div>
                                </div>
                                <div class="bold text-center">
                                    <div class="bold">{{ $contract->room->room_type }}</div>
                                    <div><strong>Room Type</strong></div>
                                </div>
                                <div class="col">
                                    <div class="card-profile-stats d-flex justify-content-center p-0">
                                        <div class="d-flex flex-column justify-content-center align-content-center">
                                            <span class="heading text-center">{{ $contract->room->number_of_occupants }}</span>
                                            <strong class="bold">Occupants</strong>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center align-content-center">
                                            <span class="heading text-center">{{ $contract->room->occupants_left }}</span>
                                            <strong class="bold">Left</strong>
                                        </div>

                                        <div class="d-flex flex-column justify-content-center align-content-center">
                                            <span class="heading text-center">{{ $contract->room->rating }}</span>
                                            <strong class="bold">Rating</strong>
                                        </div>

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-profile-stats d-flex justify-content-center p-0">
                                        <div class="d-flex flex-column justify-content-center align-content-center">
                                            <span class="heading text-center">{{ $contract->room->price }}</span>
                                            <strong class="bold">Price</strong>
                                        </div>

                                        <div class="d-flex flex-column justify-content-center align-content-center">
                                            <span class=" text-center">{{ ucwords($contract->room->gender) }}</span>
                                            <strong class="bold">Gender</strong>
                                        </div>

                                        <div class="d-flex flex-column justify-content-center align-content-center">
                                            <div class="heading text-center">

                                                @if($contract->room->state)
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
                                    <span>{{ $contract->room->description }}</span>
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

                        <form action="/contracts/{{ $contract->id }}/make-payment" method="POST">

                            @csrf

                            <h6 class="heading-small text-muted mb-4">Application Information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="address">Payment Type</label>
                                            <select class="form-control form-control-alternative {{ $errors->has('type') ? ' is-invalid' : '' }}"  name="type" id="type">
                                                <option value="">Choose Payment</option>
                                                <option value="cash" {{ old('type') == 'cash' ? 'selected' : '' }}>Cash</option>
                                                <option value="eco-cash" {{ old('type') == 'eco-cash' ? 'selected' : '' }}>Eco-cash</option>
                                            </select>
                                            @if ($errors->has('type'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('type') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="address">Amount</label>
                                            <input id="amount" name="amount" class="form-control form-control-alternative {{ $errors->has('amount') ? ' is-invalid' : '' }}"  value="{{ old('amount') }}" type="text">
                                            @if ($errors->has('amount'))
                                                <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $errors->first('amount') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="ref">Reference <span class="text-warning small">(Eco-cash)</span></label>
                                            <input id="reference" name="reference" class="form-control form-control-alternative {{ $errors->has('reference') ? ' is-invalid' : '' }}"  value="{{ old('reference') }}" type="text">
                                            @if ($errors->has('reference'))
                                                <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $errors->first('reference') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <!-- Description -->
                            <div class="">
                                <div class="row justify-content-center">
                                    <button type="submit" class="btn btn-warning">Make Payment</button>
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
