<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('property_id');
            $table->string('title');
            $table->string('room_type');
            $table->double('price');
            $table->string('number_of_occupants');
            $table->mediumText('description');
            $table->string('gender')->default('all');
            $table->integer('state')->default(0);
            $table->integer('rating')->default(0);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
