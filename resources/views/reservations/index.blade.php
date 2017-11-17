@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>{{Auth::user()->company_name}} Transport Company >> All Resrvations</strong></div>

                <div class="panel-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th style="width:130px">Date</th>
                          <th>Full Name</th>
                          <th>Contact</th>
                          <th>E-Contact</th>
                          <th>Email</th>
                          <th>From</th>
                          <th>To</th>
                          <th>Ticket Count</th>
                          <th>Amount</th>
                          <th>Operator</th>
                          <th>Bus Type</th>
                          <th>Reporting</th>
                          <th>Departure</th>
                          <th>Transaction Number</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($reservations as $reservation)
                          <tr>
                            <td>{{\Carbon\Carbon::createFromTimeStamp(strtotime($reservation->date))->toFormattedDateString()}}</td>
                             <td>{{$reservation->full_name}}</td>
                             <td>{{$reservation->contact}}</td>
                             <td>{{$reservation->e_contact}}</td>
                             <td>{{$reservation->email}}</td>
                             <td>{{$reservation->from}}</td>
                             <td>{{$reservation->to}}</td>
                             <td>{{$reservation->ticket_count}}</td>
                             <td>{{$reservation->total_amount}}</td>
                             <td>{{$reservation->operator}}</td>
                             <td>{{$reservation->bus_type}}</td>
                             <td>{{$reservation->reporting}}</td>
                             <td>{{$reservation->departure}}</td>
                             <td>{{$reservation->id}}</td>
                             <td><button class="btn btn-small btn-default"><a href="#">Send Message<a/></button></td>
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
