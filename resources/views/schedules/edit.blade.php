@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>{{Auth::user()->company_name}} Transport Company > EDIT BUS SCHEDULE</strong></div>

                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('/schedules/update/'. $schedule->id) }}">
                      {{ csrf_field() }}
                      {{ method_field('POST') }}

                      <div class="form-group">
                          <label for="type" class="col-md-4 control-label">Bus Type: </label>
                          <div class="col-md-6">
                              <select class="form-control" name="bus_type">
                                <option value="{{$schedule->bus_type}}">{{$schedule->bus_type}}</option>
                                <option value="Executive">Executive</option>
                                <option value="Economy">Economy</option>
                              </select>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="from" class="col-md-4 control-label">From: </label>
                          <div class="col-md-6">
                              <select class="form-control" name="from">
                                <option value="{{$schedule->from}}">{{$schedule->from}}</option>
                                <option value="Accra">Accra</option>
                                <option value="Kumasi">Kumasi</option>
                                <option value="Takoradi">Takoradi</option>
                                <option value="Tamale">Tamale</option>
                                <option value="Wa">Wa</option>
                                <option value="Tarkwa">Tarkwa</option>
                                <option value="Bolga">Bolga</option>
                                <option value="Yendi">Yendi</option>
                                <option value="Bawku">Bawku</option>
                              </select>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="to" class="col-md-4 control-label">To: </label>
                          <div class="col-md-6">
                              <select class="form-control" name="to">
                                <option value="{{$schedule->to}}">{{$schedule->to}}</option>
                                <option value="Accra">Accra</option>
                                <option value="Kumasi">Kumasi</option>
                                <option value="Takoradi">Takoradi</option>
                                <option value="Tamale">Tamale</option>
                                <option value="Wa">Wa</option>
                                <option value="Tarkwa">Tarkwa</option>
                                <option value="Bolga">Bolga</option>
                                <option value="Yendi">Yendi</option>
                                <option value="Bawku">Bawku</option>
                              </select>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="date" class="col-md-4 control-label">Date: </label>
                          <div class="col-md-6">
                              <input id="date" type="date" class="form-control" name="date" value="{{$schedule->date}}">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="fare" class="col-md-4 control-label">Fare: </label>
                          <div class="col-md-6">
                              <input id="fare" type="text" class="form-control" name="fare" value="{{$schedule->fare}}">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="fare" class="col-md-4 control-label">No of seats: </label>
                          <div class="col-md-6">
                              <input id="fare" type="number" min="1" step="1" class="form-control" name="seat_count" value="{{$schedule->seat_count}}">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="reporting" class="col-md-4 control-label">Reporting: </label>
                          <div class="col-md-6">
                              <input id="reporting" type="time" class="form-control" name="reporting" value="{{$schedule->reporting}}">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="departure" class="col-md-4 control-label">Departure: </label>
                          <div class="col-md-6">
                              <input id="departure" type="time" class="form-control" name="departure" value="{{$schedule->departure}}">
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">
                                  Update
                              </button>
                          </div>
                      </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
