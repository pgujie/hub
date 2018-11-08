<?php

use App\core\Location;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        echo 'Add root'.PHP_EOL;

        factory(\App\User::class , 1 )->create([
            'email' => 'pgurajena@agribank.co.zw',
            'name' => 'Prince',
            'last_name' => 'Gurajena',
        ]);

        factory(\App\User::class , 1 )->create([
            'email' => 'root@system',
            'name' => 'Root',
            'last_name' => 'System',
        ]);

        factory(\App\User::class , 1 )->create([
            'email' => 'pgurajena.agent@agribank.co.zw',
            'name' => 'Prince',
            'last_name' => 'Gurajena',
            'role' => 'agent'
        ]);

        factory(\App\User::class , 1 )->create([
            'email' => 'pgurajena.owner@agribank.co.zw',
            'name' => 'Prince',
            'last_name' => 'Gurajena',
            'role'=>'owner',
        ]);

        factory(\App\User::class , 1 )->create([
            'email' => 'pgurajena.admin@agribank.co.zw',
            'name' => 'Prince',
            'last_name' => 'Gurajena',
            'role'=>'admin'
        ]);

        echo 'Add Accounts'.PHP_EOL;

        \App\Account::create([

            'type' => 'internal',
            'name' => 'Rent Receivables',
            'user_id' => '2',
        ]);

        echo 'Add users'.PHP_EOL;


        factory(\App\User::class , 20)->create();

        echo 'Add Property'.PHP_EOL;

        $properties = factory(\App\Property::class , 30 )->create();


        $rooms_img  = [
            'rooms/images sss.jpg',
            'rooms/indexasa.jpg',
            'rooms/luxury-room-sofitel-the-palm-dubai-1200x675.jpg',
            'rooms/oakImage-1536872349845-articleLarge.jpg',
        ];

        $properties_img = [
             'properties/39754804_2182505718654134_7129834875314234369_n.jpg',
             'properties/images.jpg',
             'properties/index.jpg',
             'properties/ssss.jpg',
        ];

        $unlisted = factory(\App\Property::class , 10 )->create(['type' => 'un-listed']);

        foreach ($unlisted as $property){

            echo 'Add Image'.PHP_EOL;
            $property->addThumbnail('img/'.$properties_img[array_rand($properties_img,1)]);

            echo 'Get location'.PHP_EOL;

            $location  = factory(Location::class)->make();

            $property->addLocation ($location->toArray() );

            echo 'Add Rooms'.PHP_EOL;

            $rooms = factory(\App\Room::class , 2 )->make();

            foreach ( $rooms as $room ){

                echo 'Giving Rooms'.PHP_EOL;
                $tempRoom = $property->addRoom($room->toArray());
                $tempRoom->addThumbnail('img/'.$rooms_img[array_rand($rooms_img,1)]);

            }

        }
        
        foreach ($properties as $property){

            echo 'Add Image'.PHP_EOL;
            $property->addThumbnail('img/'.$properties_img[array_rand($properties_img,1)]);

            echo 'Get location'.PHP_EOL;

            $location  = factory(Location::class)->make();

            $property->addLocation ($location->toArray() );

            echo 'Add Rooms'.PHP_EOL;

            $rooms = factory(\App\Room::class , 5 )->make();

            foreach ( $rooms as $room ){

                echo 'Giving Rooms'.PHP_EOL;
                $tempRoom = $property->addRoom($room->toArray());

                $tempRoom->addThumbnail('img/'.$rooms_img[array_rand($rooms_img,1)]);

            }

        }

        // Getting rooms

        echo 'Getting Rooms'.PHP_EOL;

        $rooms = \App\Room::where('id' , '<' , 98 )->where('id' , '>' , 19 )->get();

        foreach ( $rooms as $room ){

            // applying rooms
            echo 'Applying rooms : '.$room->id .PHP_EOL;


            $room->requests()->create([

                'user_id' => factory(\App\User::class)->create()->id ,
                'request_state' => 0,
                'balance' => $room->price,
                'room_id' => $room->id,
                'start_date' => \Carbon\Carbon::createMidnightDate(2018,11,2),
                'end_date' => \Carbon\Carbon::createMidnightDate(2018,11,2)->addDay(20)->subSecond(1),

            ]);

        }

        echo 'Getting Rooms'.PHP_EOL;

        $rooms = \App\Room::where('id' , '<' , 160 )->where('id' , '>' , 100 )->get();

        foreach ( $rooms as $room ){

            // applying rooms
            echo 'Applying rooms : '.$room->id .PHP_EOL;

            $start_date = \Carbon\Carbon::createMidnightDate(2018,11,2);
            $end_date = \Carbon\Carbon::createMidnightDate(2018,11,2)->addDay(random_int(23,150))->subSecond(1);


            $request = $room->requests()->create([

                'user_id' => factory(\App\User::class)->create()->id ,
                'request_state' =>1,
                'balance' => $room->price,
                'start_date' => $start_date,
                'end_date' => $end_date,

            ]);


            $balance  =  $end_date->diffInDays($start_date);
            $balance /= 30;
            $balance *= $request->balance;
            $balance = ceil($balance);


            echo 'Giving Contracts for room : '.$room->id .PHP_EOL;

            $request->room->contracts()->create([

                'start_date' => $start_date,
                'end_date' =>  $end_date,
                'request_id' => $request->id,
                'user_id' => $request->user_id,
                'state' => 0,
                'balance' => $balance,
                'amount' => $balance,
                'room_id' => $room->id

            ]);

        }
    }
}
