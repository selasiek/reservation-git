<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_id');
            $table->string('bus_type');
            $table->string('from');
            $table->string('to');
            $table->date('date');
            $table->integer('seat_count')->unsigned()->default(0);
            $table->integer('seats_sold')->unsigned()->default(0);
            $table->string('fare');
            $table->string('reporting');
            $table->string('departure');
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
        Schema::drop('schedules');
    }
}
