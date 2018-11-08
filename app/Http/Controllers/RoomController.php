<?php

namespace App\Http\Controllers;

use App\Property;
use App\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Property $property)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Property $property
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Property $property)
    {
        return view('dashboard.rooms.create', compact('property'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Property $property
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Property $property , Request $request)
    {

        $this->validate( $request , [

            'title' => 'required|min:2|max:255',
            'room_type' => 'required|min:2|max:255',
            'price' => 'required|min:2|max:255',
            'description' => 'required|min:10|max:255',
            'gender' => 'required|min:2|max:255',
            'number_of_occupants' => 'required|max:255',
            'image-thumbnail'=>'required|image',

        ]);

        try {

            $path = $request->file('image-thumbnail')->store('properties-images','public');

            $room = $property->addRoom([

                'title' => $request->title,
                'room_type' => $request->room_type,
                'price' => $request->price,
                'description' => $request->description,
                'gender' => $request->gender,
                'number_of_occupants' => $request->number_of_occupants

            ]);

            $room->addThumbnail('storage/'.$path);

        } catch ( \Exception $exception ){

            abort(422, $exception->getMessage() );

        }


        return back()->with('message','Room Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $room->load(['thumbnails']);
        return view('dashboard.rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {

        $this->validate( $request , [

            'title' => 'required|min:2|max:255',
            'room_type' => 'required|min:2|max:255',
            'price' => 'required|min:2|max:255',
            'description' => 'required|min:10|max:255',
            'gender' => 'required|min:2|max:255',
            'number_of_occupants' => 'required|max:255',

        ]);

        $room->update([

            'title' => $request->title,
            'room_type' => $request->room_type,
            'price' => $request->price,
            'description' => $request->description,
            'gender' => $request->gender,
            'number_of_occupants' => $request->number_of_occupants

        ]);

        return back()->with('message','Room Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
