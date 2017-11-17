<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
  protected $table = 'schedules';

  protected $fillable = [
      'id','client_id','bus_type','from','to','date','fare','reporting','departure',
    ];

    protected $dates = ['date'];



    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
