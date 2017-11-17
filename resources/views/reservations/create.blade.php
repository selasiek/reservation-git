@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-offset-1 col-md-6">

          <!-- reservation form -->

            <div class="panel panel-default">
                <div class="panel-heading">
                  @if (Auth::guest())
                    <strong>Enter your details</strong>
                  @else
                    <strong>{{Auth::user()->company_name}} > Enter Customer Details</strong>
                  @endif
                </div>
                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('/reservations/summary/') }}">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                      <input type="hidden" name="operator_id" value="{{$operator->id}}">
                      <input type="hidden" name="operator" value="{{$operator->company_name}}">
                      <input type="hidden" name="bus_type" value="{{$schedule->bus_type}}">
                      <input type="hidden" name="from" value="{{$schedule->from}}">
                      <input type="hidden" name="to" value="{{$schedule->to}}">
                      <input type="hidden" name="date" value="{{$schedule->date}}">
                      <input type="hidden" name="reporting" value="{{$schedule->reporting}}">
                      <input type="hidden" name="departure" value="{{$schedule->departure}}">
                      <input type="hidden" name="total_fare" value="{{$schedule->fare}}">
                      <input type="hidden" name="ticket_count" value="{{$ticket_count}}">
                      <input type="hidden" name="processing_fee" value="{{$processing_fee}}">
                      <input type="hidden" name="total_amount" value="{{$total_amount}}">

                      <div class="form-group">
                          <label for="date" class="col-md-4 control-label">Full Name: </label>
                          <div class="col-md-6">
                              <input id="date" type="text" class="form-control" name="full_name" required>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="fare" class="col-md-4 control-label">Contact: </label>
                          <div class="col-md-6">
                              <input id="fare" type="text" class="form-control" name="contact" required>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="reporting" class="col-md-4 control-label">Emergency Contact: </label>
                          <div class="col-md-6">
                              <input id="reporting" type="text" class="form-control" name="e_contact">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="departure" class="col-md-4 control-label">Email: </label>
                          <div class="col-md-6">
                              <input id="departure" type="email" class="form-control" name="email">
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-warning">
                                  NEXT
                              </button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

        <!-- Itinerary -->
        <div class="col-md-4 ">
              <div class="panel panel-default">
                  <div class="panel-heading"><strong><font size="3">ITINERARY</font></strong></div>

                  <div class="panel-body">

                    <dl class="dl-horizontal">
                      <dt>Bus Operator:</dt>
                      <dd>{{$operator->company_name}}</dd>
                      <hr>
                      <dt>Bus Type:</dt>
                      <dd>{{$schedule->bus_type}}</dd>
                      <hr>
                      <dt>From:</dt>
                      <dd>{{$schedule->from}}</dd>
                      <hr>
                      <dt>To:</dt>
                      <dd>{{$schedule->to}}</dd>
                      <hr>
                      <dt>Travel Date:</dt>
                      <dd>{{\Carbon\Carbon::createFromTimeStamp(strtotime($schedule->date))->toFormattedDateString()}}</dd>
                      <hr>
                      <dt>Reporting Time:</dt>
                      <dd>{{$schedule->reporting}}</dd>
                      <hr>
                      <dt>Departure Time:</dt>
                      <dd>{{$schedule->departure}}</dd>
                      <hr>
                      <dt>No. of Tickets:</dt>
                      <dd>{{$ticket_count}}</dd>
                      <hr>
                      <dt>Bus Fare:</dt>
                      <dd>GHC {{$schedule->fare}}.00</dd>
                      <hr>
                      <dt>Processing Fee:</dt>
                      <dd>GHC {{$processing_fee}}</dd>
                      <hr>
                      <dt>Total Amount:</dt>
                      <dd><strong>GHC {{$total_amount}}</strong></dd>
                    </dl>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection
