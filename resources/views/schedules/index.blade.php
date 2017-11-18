@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>{{Auth::user()->company_name}} Transport Company >> All Available Schedules</strong></div>

                <div class="panel-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>Bus Type</th>
                          <th>From</th>
                          <th>To</th>
                          <th>Date</th>
                          <th>Fare</th>
                          <th>Seats Sold</th>
                          <th>Seats Available</th>
                          <th>Reporting</th>
                          <th>Departure</th>
                          <th>Action</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($schedules as $schedule)
                          <tr>
                             <td>{{$schedule->bus_type}}</td>
                             <td>{{$schedule->from}}</td>
                             <td>{{$schedule->to}}</td>
                             <td>{{\Carbon\Carbon::createFromTimeStamp(strtotime($schedule->date))->toFormattedDateString()}}</td>
                             <td>GHC {{$schedule->fare}}.00</td>
                             <td>{{$schedule->seats_sold}}</td>
                             <td>{{$schedule->seat_count}}</td>
                             <td>{{$schedule->reporting}}</td>
                             <td>{{$schedule->departure}}</td>
                             <td> <a href="{{url('/schedules/destroy/'. $schedule->id)}}">Remove<a> | <a href="{{url('/schedules/'. $schedule->id . '/edit')}}">Edit<a></td>
                             <!-- <td><button class="btn btn-small btn-default"><a href="#">Details<a/></button></td> -->
                          </tr>
                      @endforeach
                      <tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
