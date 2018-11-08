<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->integer('room_id');
            $table->integer('request_id');
            $table->integer('user_id');
            $table->double('balance')->default(0);
            $table->double('amount')->default(0);
            $table->integer('state')->default(0);
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
        Schema::dropIfExists('contracts');
    }
}
