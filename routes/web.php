<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//Home Page

Route::get('/', function () {

    $listed_properties = \App\Property::with(['thumbnails','location','agent'])->TypeOfProperty('listed')->orderBy('rating','desc')->paginate(6,['*'],'listed-page');
    $un_listed = \App\Property::with(['thumbnails','location','agent'])->TypeOfProperty('un-listed')->orderBy('rating','desc')->paginate(6,['*'],'un-listed-page');
    $slider_properties = \App\Property::with(['thumbnails','location','agent'])->TypeOfProperty('listed')->latest()->limit(2)->get(2);

      return view('welcome.index',
          compact([
              'slider_properties',
              'listed_properties',
              'un_listed',
          ])
      );

});

// Single Property Page

Route::get('/property/normal-view/{property}', function (\App\Property $property) {

    $property->load(['thumbnails','location','agent']);
    $rooms  = \App\Room::where('property_id',$property->id )->with('thumbnails')->paginate(4,['*'],'rooms-page');
    return view('welcome.properties.view', compact(['rooms','property']));

});

Route::get('/property/{property}', 'PropertyController@show');

Route::get('/request/book-room/{room}','RequestController@create');
Route::post('/request/book-room/{room}/accept','RequestController@store');


Route::get('/request/cancel-room/{room}','RequestController@destroy');


// Dash Board
//Properties
Route::get('/properties/dash-view', 'PropertyController@index');
Route::get('/properties/dash-view/edit/{property}', 'PropertyController@edit');
Route::get('properties/add-form' , 'PropertyController@create');
Route::post('/properties','PropertyController@store');
Route::post('/properties/{property}/update','PropertyController@update');

// Rooms
Route::get('rooms/{property}/add' , 'RoomController@create');
Route::post('rooms/{property}/add' , 'RoomController@store');
Route::get('rooms/{property}/view' , 'PropertyController@rooms');
Route::get('rooms/edit/{room}' , 'RoomController@edit');
Route::post('rooms/edit/{room}' , 'RoomController@update');

//Applications
Route::get('/applications/dash-view', 'RequestController@index');
Route::get('/applications/{request}/accept', 'RequestController@edit');
Route::post('/applications/{roomRequest}/accept', 'RequestController@update');

// Contracts
Route::get('/contracts/dash-view', 'ContractController@index');
Route::get('/contracts/{request}/accept', 'RequestController@edit');
Route::post('/contracts/{roomRequest}/accept', 'RequestController@update');

//Payments
Route::get('/contracts/{contract}/make-payment', 'PaymentController@create');
Route::post('/contracts/{contract}/make-payment', 'PaymentController@store');


Route::get('/dashboard', function () {
    return view('dashboard.index');
});


Route::get('/test', function (){

    $date = \Carbon\Carbon::now();
    $date2 = \Carbon\Carbon::now()->addDay(52);
    return $date->diffInMonths($date2 , true );

});



Route::get('/request/add-contract/{room}','RequestController@destroy');

Auth::routes( ['verify' => true] );

Route::get('/home', 'HomeController@index')->name('home');
