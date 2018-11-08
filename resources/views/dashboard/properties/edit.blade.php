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
            <div class="col-xl-5 mb-5 ">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img style="border-radius: 0;max-height: 200px;min-height: 150px"  src="{{ asset($property->thumbnails[0]->path) }}" class="card-img  shadow p-0">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header bg-secondary text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <a href="/rooms/{{ $property->id }}/view" class="btn btn-sm btn-info mr-4">View Rooms</a>
                            <a href="/rooms/{{ $property->id }}/add" class="btn btn-sm btn-default float-right">Add Room</a>
                        </div>
                    </div>
                    <div class="card-body pt-3">
                        <div class="row border-bottom ">
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
                        <div class="card-text border-bottom p-3 pt-0">
                            <div class="text-center text-darker text-capitalize h3">Info</div>
                            <span class="text-muted">Last Updated : </span> {{ $property->updated_at }} <br>
                            <span class="text-muted">Created  :</span> {{ $property->created_at  }} <br>
                        </div>

                        <div class="card-text border-bottom p-3 pt-0">
                            <div class="text-center text-darker text-capitalize h3">Agent</div>
                            <span class="text-muted">Name : </span> {{ $property->agent->full_name }} <br>
                            <span class="text-muted">Phone :</span> {{ $property->agent->phone }} <br>
                            <span class="text-muted"> Email :</span>  {{ $property->agent->email }} <br>
                        </div>
                        <div class="card-text border-bottom p-3 pt-0">
                            <div class="text-center text-darker text-capitalize h3">Owner</div>
                            <span class="text-muted">Name : </span> {{ $property->owner->full_name }} <br>
                            <span class="text-muted">Phone :</span> {{ $property->owner->phone }} <br>
                            <span class="text-muted"> Email :</span>  {{ $property->owner->email }} <br>
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
                <div class="card bg-secondary shadow border-0">
                    <div class="card-header bg-white pb-2">
                        <div class="text-muted text-center mb-3">
                            <h5>Edit Property</h5>
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
                    <div class="card-body p-3">

                        <form action="/properties/{{ $property->id }}/update" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">Property Information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="owner">Owner</label>
                                            <input type="text" id="owner" name="owner" class="form-control form-control-alternative {{ $errors->has('owner') ? ' is-invalid' : '' }}"  value="{{ old('owner', $property->owner->email )  }}">
                                            @if ($errors->has('owner'))
                                                <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $errors->first('owner') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="agent">Agent</label>
                                            <input name="agent" id="agent" class="form-control form-control-alternative {{ $errors->has('agent') ? ' is-invalid' : '' }}" value="{{ old('agent', $property->agent->email ) }}" type="text">
                                            @if ($errors->has('agent'))
                                                <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $errors->first('agent') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="address">Property Type</label>
                                            <select class="form-control form-control-alternative {{ $errors->has('owner') ? ' is-invalid' : '' }}"  name="type" id="type">
                                                <option value="">Choose Property Type</option>
                                                <option value="listed" {{ old('type', $property->type ) == 'listed' ? 'selected' : '' }}> Listed Property</option>
                                                <option value="un-listed" {{ old('type' ,$property->type ) == 'un-listed' ? 'selected' : '' }}>Un-Listed Property</option>
                                            </select>
                                            @if ($errors->has('type'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('type') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="address">Address</label>
                                            <input id="address" name="address" class="form-control form-control-alternative {{ $errors->has('address') ? ' is-invalid' : '' }}"  value="{{ old('address', $property->address) }}" type="text">
                                            @if ($errors->has('address'))
                                                <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $errors->first('owner') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-address">Description</label>
                                            <input id="description" name="description" class="form-control form-control-alternative  {{ $errors->has('description') ? ' is-invalid' : '' }}"  value="{{ old('description', $property->description) }}"  type="text">
                                            @if ($errors->has('description'))
                                                <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <!-- Address -->
                            {{--<h6 class="heading-small text-muted mb-4">Gallery</h6>--}}
                            {{--<div class="pl-lg-4">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-md-12">--}}
                                        {{--<div class="form-group">--}}
                                            {{--<input type="file" style="border-radius: 0.375rem"  accept="image/*" name="image-thumbnail" id="file" class="form-control-alternative bg-white p-2 w-100 {{ $errors->has('image-thumbnail') ? ' is-invalid' : '' }}"  value="{{ old('image-thumbnail') }}"/>--}}
                                            {{--@if ($errors->has('image-thumbnail'))--}}
                                                {{--<span class="text-warning small" role="alert">--}}
                                                         {{--<strong>{{ $errors->first('image-thumbnail') }}</strong>--}}
                                                    {{--</span>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<hr class="my-4">--}}
                            <!-- Description -->

                            <h6 class="heading-small text-muted mb-4">Location Information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="lat">Latitude</label>
                                            <input id="lat" name="lat" class="form-control form-control-alternative {{ $errors->has('lat') ? ' is-invalid' : '' }}"  value="{{ old('lat', $property->location->lat) }}" type="text">
                                            @if ($errors->has('lat'))
                                                <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $errors->first('lat') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="long">Longitude</label>
                                            <input id="long" name="long" class="form-control form-control-alternative {{ $errors->has('long') ? ' is-invalid' : '' }}"  value="{{ old('long', $property->location->long) }}" type="text">
                                            @if ($errors->has('long'))
                                                <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $errors->first('long') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-username">Suburb</label>
                                            <input id="suburb"  name="suburb" class="form-control form-control-alternative {{ $errors->has('suburb') ? ' is-invalid' : '' }}"  value="{{ old('suburb', $property->location->suburb) }}" type="text">
                                            @if ($errors->has('suburb'))
                                                <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $errors->first('suburb') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">City</label>
                                            <input name="city" id="city" class="form-control form-control-alternative {{ $errors->has('city') ? ' is-invalid' : '' }}"  value="{{ old('city', $property->location->city) }}" type="text">
                                            @if ($errors->has('city'))
                                                <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $errors->first('city') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-address">Province</label>
                                            <input id="province" name="province" class="form-control form-control-alternative {{ $errors->has('province') ? ' is-invalid' : '' }}"  value="{{ old('province', $property->location->province) }}"  type="text">
                                            @if ($errors->has('province'))
                                                <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $errors->first('province') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <button type="submit" class="btn btn-warning">Save Property</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
