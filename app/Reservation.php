<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';

    protected $fillable = [
      'id',
      'operator_id',
      'bus_type',
      'reporting',
      'departure',
      'full_name',
      'contact',
      'email',
      'e_contact',
      'from',
      'to',
      'ticket_count',
      'total_amount',
      'seat_number',
      'ticket_number',
      'date',
      'cancel_flag',
      'transaction_id',
    ];

    protected $dates = [
    'date',
  ];

}
