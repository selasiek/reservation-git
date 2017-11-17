<?php


Route::auth();

//Guest routes
Route::get('/', 'GuestController@main');
Route::get('/home', 'GuestController@index');
Route::post('/route/search', 'GuestController@search');

//client dashboard
Route::get('/dashboard', 'DashController@index');

//schedules controller
Route::post('/schedules/store', 'ScheduleController@store');
Route::get('/schedules/destroy/{id}', 'ScheduleController@destroy');
Route::post('/schedules/update/{id}', 'ScheduleController@update');
Route::resource('schedules', 'ScheduleController');

//reservations controller
Route::post('/reservations/create/', 'ReservationsController@create');
Route::get('/reservations/show/{id}', 'ReservationsController@show');
Route::post('/reservations/store', 'ReservationsController@store');
Route::post('/reservations/summary/', 'ReservationsController@summary');
Route::resource('reservations', 'ReservationsController');

Route::get('/foo', function () {
  $nexmo = app('Nexmo\Client');

  $nexmo->message()->send([
            'to' => '233542873229',
            'from' => 'TICKETAFRIQ',
            'text' => 'This is a test message from ticketafriq.com.'
  ]);
  return 'Done!!!';

});
