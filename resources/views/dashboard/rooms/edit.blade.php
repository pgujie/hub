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
                            <h2 class="text-center">Room Info</h2>
                        </div>
                        <div class="card-body">
                                <div  class="row p-0">
                                    <div class="col-lg-5 col-sm-12">
                                        <img src="{{ asset($room->thumbnails[0]->path)  }}" style="border-radius: 0;max-height: 200px;min-height: 150px"  class="card-img  h-100  shadow p-0" alt="">
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="bold text-center">
                                            <div class="bold">{{ $room->created_at }}</div>
                                            <div><strong>Created at</strong></div>
                                        </div>
                                        <div class="bold text-center">
                                            <div class="bold">{{ $room->room_type }}</div>
                                            <div><strong>Room Type</strong></div>
                                        </div>
                                        <div class="col">
                                            <div class="card-profile-stats d-flex justify-content-center p-0">
                                                <div class="d-flex flex-column justify-content-center align-content-center">
                                                    <span class="heading text-center">{{ $room->number_of_occupants }}</span>
                                                    <strong class="bold">Occupants</strong>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center align-content-center">
                                                    <span class=" text-center">{{ ucwords($room->gender) }}</span>
                                                    <strong class="bold">Gender</strong>
                                                </div>

                                                <div class="d-flex flex-column justify-content-center align-content-center">
                                                    <span class="heading text-center">{{ $room->rating }}</span>
                                                    <strong class="bold">Rating</strong>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card-profile-stats d-flex justify-content-center p-0">
                                                <div class="d-flex flex-column justify-content-center align-content-center">
                                                    <span class="heading text-center">{{ $room->price }}</span>
                                                    <strong class="bold">Price</strong>
                                                </div>

                                                <div class="d-flex flex-column justify-content-center align-content-center">
                                                    <div class="heading text-center">

                                                            @if($room->state)
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
                                            <span>{{ $room->description }}</span>
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
                            <h5> Edit Room </h5>
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

                        <form action="/rooms/edit/{{ $room->id }}" method="POST" >

                            @csrf

                            <h6 class="heading-small text-muted mb-4">Room Information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="address">Title</label>
                                            <input id="title" name="title" class="form-control form-control-alternative {{ $errors->has('title') ? ' is-invalid' : '' }}"  value="{{ old('title', $room->title) }}" type="text">
                                            @if ($errors->has('title'))
                                                <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $errors->first('title') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="address">Room Type</label>
                                            <input id="room_type" name="room_type" class="form-control form-control-alternative {{ $errors->has('room_type') ? ' is-invalid' : '' }}"  value="{{ old('room_type', $room->room_type) }}" type="text">
                                            @if ($errors->has('room_type'))
                                                <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $errors->first('room_type') }}</strong>s
                                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="address">Number of Occupants</label>
                                            <input id="number_of_occupants" name="number_of_occupants" class="form-control form-control-alternative {{ $errors->has('number_of_occupants') ? ' is-invalid' : '' }}"  value="{{ old('number_of_occupants', $room->number_of_occupants) }}" type="text">
                                            @if ($errors->has('number_of_occupants'))
                                                <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $errors->first('number_of_occupants') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="address">Price</label>
                                            <input id="price" name="price" class="form-control form-control-alternative {{ $errors->has('price') ? ' is-invalid' : '' }}"  value="{{ old('price', $room->price ) }}" type="text">
                                            @if ($errors->has('price'))
                                                <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $errors->first('price') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="address">Description</label>
                                            <input id="description" name="description" class="form-control form-control-alternative {{ $errors->has('description') ? ' is-invalid' : '' }}"  value="{{ old('description' , $room->description ) }}" type="text">
                                            @if ($errors->has('description'))
                                                <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $errors->first('description') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="address">Gender</label>
                                            <select class="form-control form-control-alternative {{ $errors->has('gender') ? ' is-invalid' : '' }}"  name="gender" id="gender">
                                                {{--<option value="">Choose Gender</option>--}}
                                                <option value="all" {{ old('gender' , $room->gender ) == 'all' ? 'selected' : '' }}>All</option>
                                                <option value="male" {{ old('gender', $room->gender ) == 'male' ? 'selected' : '' }}>Male</option>
                                                <option value="female" {{ old('gender', $room->gender ) == 'female' ? 'selected' : '' }}>Female</option>
                                            </select>
                                            @if ($errors->has('gender'))
                                                <div class="text-warning small" role="alert">
                                                    <strong>{{ $errors->first('gender') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <hr class="my-4">
                            <!-- Description -->
                            <div class="pl-lg-4">
                                <div class="row justify-content-center">
                                    <button type="submit" class="btn btn-warning">Save Room</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
