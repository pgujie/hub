<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {

    return [
        'name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'role' => 'default',
        'gender' => 'male',
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),

    ];
});


$factory->define(App\Thumbnail::class, function (Faker $faker) {

    return [
        'path' => 'img/theme/profile-cover.jpg',
    ];
});




$factory->define(App\Property::class, function (Faker $faker) {


    return [

        'owner_id' => 1 ,
        'agent_id' => 1 ,
        'address' => $faker->address,
        'description' => $faker->sentence,
        'type' => 'listed',
        'rating' => $faker->numberBetween(0,5)

    ];

});

$factory->define(App\Room::class, function (Faker $faker) {

    return [

        'title' => $faker->name,
        'price' => $faker->numberBetween(20,150),
        'number_of_occupants' => $faker->numberBetween(2,3),
        'description' => $faker->sentence,
        'room_type' => $faker->text(15),

    ];

});


$factory->define(\App\core\Location::class, function (Faker $faker) {

    return [

        'lat' => $faker->latitude,
        'long' => $faker->longitude,
        'suburb' => $faker->city,
        'city' => $faker->citySuffix,
        'province' => $faker->country,

    ];

});
