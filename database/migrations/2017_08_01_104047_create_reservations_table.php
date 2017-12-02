<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('operator_id');
            $table->string('bus_type');
            $table->string('reporting');
            $table->string('departure');
            $table->string('full_name');
            $table->string('contact');
            $table->string('email');
            $table->string('e_contact');
            $table->string('from');
            $table->string('to');
            $table->string('ticket_count');
            $table->string('total_amount');
            $table->date('date');
            $table->string('seat_number');
            $table->string('ticket_number');
            $table->string('cancel_flag');
            $table->string('invoice_number');
            $table->string('transaction_id');
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
        Schema::drop('reservations');
    }
}
