<?php

namespace App\Http\Controllers;

use App\Request as RoomRequest;
use App\Room;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $requests =  \App\Request::where('request_state',0)->with(['room.property.location','user'])->paginate(20);
//        return $requests;
        return view('dashboard.applications.index', compact('requests') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Room $room)
    {
        $room->load('property');
        return view('welcome.rooms.book', compact('room'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Room $room
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request  $request , Room $room): \Illuminate\Http\RedirectResponse
    {

        $this->validate($request , [
            'start_date' => 'required|date|min:10|max:10',
            'end_date' => 'required|date|min:10|max:10',
        ]);

        //Check if user booked
        if ($room->user_booked){
            return back()->with('message-warning','You have already booked for this room');
        }


        // Check if room is fully booked
        if ($room->occupants_left < 1 ){
           return back()->with('message-danger','Room is fully booked');
        }

        // creates request - book room

        $room->requests()->create([

            'user_id' => auth()->id(),
            'request_state' => 0,
            'balance' => $room->price,
            'start_date' =>  $this->getCarbonDateFromString($request->start_date, true),
            'end_date' =>  $this->getCarbonDateFromString($request->end_date , false ),

        ]);

        // Check if room is full
        if ( $room->occupants_left - 1  < 1 && $room->state == 0 ){
              $room->update(['state' => 1 ]);
        }

        $room->load('property');

        return redirect("/property/normal-view/{$room->property->id}" )->with('message-success','Room Booked Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(RoomRequest $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param RoomRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(RoomRequest $request)
    {
        $request->load(['room.property.location','room.thumbnails','user']);
        return view('dashboard.applications.edit', compact('request'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param RoomRequest $roomRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, RoomRequest $roomRequest): \Illuminate\Http\RedirectResponse
    {
        // TODO : Create invoice

        $this->validate($request , [
            'start_date' => 'required|date|min:10|max:10',
            'end_date' => 'required|date|min:10|max:10',
            'choice' => 'required|integer',
        ]);

        $roomRequest->update([
            'request_state'=> $request->choice
        ]);

        $start_date = $this->getCarbonDateFromString($request->start_date, true);
        $end_date = $this->getCarbonDateFromString($request->end_date , false );

        $balance  =  $end_date->diffInDays($start_date);
        $balance /= 30;
        $balance *= $roomRequest->balance;

        $roomRequest->room->contracts()->create([

            'start_date' => $start_date,
            'end_date' =>  $end_date,
            'request_id' => $roomRequest->id,
            'user_id' => $roomRequest->user_id,
            'state' => 0 ,
            'balance' => $balance,
            'amount' => $balance,

        ]);

        return redirect('/applications/dash-view')->with('message-success','Application Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {

       $room->update([
           'state' => 0
       ]);

       $room->requestsByUser()->update([
           'request_state' => 2
       ]);

        return back()->with('message-success','Room Removed Successfully');

    }

    /**
     * @param $date
     * @return \Carbon\Carbon
     */
    public function getCarbonDateFromString( $date , $start = true ): \Carbon\Carbon
    {
        $date = explode('/', $date);

        if ($start) {

            return \Carbon\Carbon::create((int)$date[2], (int)$date[1], (int)$date[0],0,0,0);
        }

        $temp = \Carbon\Carbon::create((int)$date[2], (int)$date[1], (int)$date[0],23,59,59);

        return $temp;

    }
}
