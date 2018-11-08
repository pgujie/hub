@extends('layouts.dashboard',[ 'title' => 'Properties' ])
@section('content')

    <div class="header bg-gradient-warning  pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body py-2">

            </div>
        </div>
    </div>
    <div class="container-fluid mt--9">
        <!-- Card stats -->
        <div class="row justify-content-center">

            <div class="col-lg-5 px-0">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-header bg-white pb-2">
                        <div class="text-muted text-center mb-3">
                            <h5> Add Rooms </h5>
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

                        <form action="/rooms/{{ $property->id }}/add" method="POST" enctype="multipart/form-data">

                            @csrf

                            <h6 class="heading-small text-muted mb-4">Room Information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="address">Title</label>
                                            <input id="title" name="title" class="form-control form-control-alternative {{ $errors->has('title') ? ' is-invalid' : '' }}"  value="{{ old('title') }}" type="text">
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
                                            <input id="room_type" name="room_type" class="form-control form-control-alternative {{ $errors->has('room_type') ? ' is-invalid' : '' }}"  value="{{ old('room_type') }}" type="text">
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
                                            <input id="number_of_occupants" name="number_of_occupants" class="form-control form-control-alternative {{ $errors->has('number_of_occupants') ? ' is-invalid' : '' }}"  value="{{ old('number_of_occupants') }}" type="text">
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
                                            <input id="price" name="price" class="form-control form-control-alternative {{ $errors->has('price') ? ' is-invalid' : '' }}"  value="{{ old('price') }}" type="text">
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
                                            <input id="description" name="description" class="form-control form-control-alternative {{ $errors->has('description') ? ' is-invalid' : '' }}"  value="{{ old('description') }}" type="text">
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
                                                <option value="">Choose Gender</option>
                                                <option value="all" {{ old('gender') == 'all' ? 'selected' : '' }}>All</option>
                                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
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
                            <h6 class="heading-small text-muted mb-4">Gallery</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="file" style="border-radius: 0.375rem"  accept="image/*" name="image-thumbnail" id="file" class="form-control-alternative bg-white p-2 w-100 {{ $errors->has('image-thumbnail') ? ' is-invalid' : '' }}"  value="{{ old('image-thumbnail') }}"/>
                                            @if ($errors->has('image-thumbnail'))
                                                <span class="text-warning small" role="alert">
                                                         <strong>{{ $errors->first('image-thumbnail') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <!-- Description -->
                            <div class="pl-lg-4">
                                <div class="row justify-content-center">
                                    <button type="submit" class="btn btn-warning">Add Rooms</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
