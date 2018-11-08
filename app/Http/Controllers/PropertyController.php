<?php

namespace App\Http\Controllers;

use App\Property;
use App\User;
use Illuminate\Http\Request;

class PropertyController extends Controller
{




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $properties =  \App\Property::with(['thumbnails','location','agent','owner'])->latest()->paginate(20);
        return view('dashboard.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.properties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[

            'image-thumbnail'=>'required|image',
            'owner'=>'required|email|min:2|max:255|exists:users,email',
            'agent'=>'required|email|min:2|max:255|exists:users,email',
            'address'=>'required|min:2|max:255',
            'type'=>'required|min:2|max:255',
            'description'=>'required|min:2|max:255',
            'suburb'=>'required|min:2|max:255',
            'city'=>'required|min:2|max:255',
            'province'=>'required|min:2|max:255',

        ]);


        try {

            $agent = User::where('email', $request->agent )->pluck('id')->first();
            $owner = User::where('email', $request->owner )->pluck('id')->first();

            $property = Property::create([
                'owner_id' => $owner,
                'agent_id' => $agent,
                'address' => $request->address,
                'description' => $request->description,
                'type' => $request->type,
            ]);

            $path = $request->file('image-thumbnail')->store('properties-images','public');

            $property->addLocation([

                'lat' => $request->lat,
                'long' => $request->long,
                'province' => $request->province,
                'city' => $request->city,
                'suburb' => $request->suburb,

            ]);

            $property->addThumbnail('storage/'.$path);

        } catch (\Exception $exception ){

            abort(422,$exception->getMessage() );

        }

        return back()->with('message','Property added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        $property->load(['agent','owner']);
        return view('properties.show',compact('property'));

    }

    public function rooms(Property $property){

//       $property->load(['thumbnails','location','agent']);
        $rooms  = \App\Room::where('property_id',$property->id )->with(['property'])->paginate(20,['*'],'rooms-page');
        return view('dashboard.rooms.index',compact('rooms'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        $property->load(['thumbnails','location','agent']);
        $rooms  = \App\Room::where('property_id',$property->id )->with('thumbnails')->paginate(4,['*'],'rooms-page');
        return view('dashboard.properties.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $this->validate($request,[

//            'image-thumbnail'=>'required|image',
            'owner'=>'required|email|min:2|max:255|exists:users,email',
            'agent'=>'required|email|min:2|max:255|exists:users,email',
            'address'=>'required|min:2|max:255',
            'type'=>'required|min:2|max:255',
            'description'=>'required|min:2|max:255',
            'suburb'=>'required|min:2|max:255',
            'city'=>'required|min:2|max:255',
            'province'=>'required|min:2|max:255',

        ]);


        try {

            $agent = User::where('email', $request->agent )->pluck('id')->first();
            $owner = User::where('email', $request->owner )->pluck('id')->first();

            $property->update([

                'owner_id' => $owner,
                'agent_id' => $agent,
                'address' => $request->address,
                'description' => $request->description,
                'type' => $request->type,

            ]);

//            $path = $request->file('image-thumbnail')->store('properties-images','public');

            $property->updateLocation([

                'lat' => $request->lat,
                'long' => $request->long,
                'province' => $request->province,
                'city' => $request->city,
                'suburb' => $request->suburb,

            ]);

//            $property->addThumbnail('storage/'.$path);

        } catch (\Exception $exception ){

            abort(422,$exception->getMessage() );

        }

        return back()->with('message','Property Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }
}
