<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';

    protected $fillable = [
      'id',
      'operator_id',
      'full_name',
      'contact',
      'email',
      'e_contact',
      'from',
      'to',
      'bus_type',
      'reporting',
      'departure',
      'ticket_count',
      'total_amount',
      'ticket_number',
      'date',
      'seat_number',
      'cancel_flag',
      'invoice_number',
      'transaction_id',
    ];

    protected $dates = [
    'date',
  ];

}
