@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">

          <!-- reservation form -->

            <div class="panel panel-default">
                <div class="panel-heading">
                  <h3>TRANSACTION SUMMARY</h3>
                </div>
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('/reservations/store/') }}" target="hiddenFrame">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                      <input type="hidden" name="operator_id" value="{{$transaction_summary["operator_id"]}}">
                      <input type="hidden" name="schedule_id" value="{{$transaction_summary["schedule_id"]}}">
                      <input type="hidden" name="full_name" value="{{$transaction_summary["full_name"]}}">
                      <input type="hidden" name="contact" value="{{$transaction_summary["contact"]}}">
                      <input type="hidden" name="e_contact" value="{{$transaction_summary["e_contact"]}}">
                      <input type="hidden" name="email" value="{{$transaction_summary["email"]}}">
                      <input type="hidden" name="operator" value="{{$transaction_summary["operator"]}}">
                      <input type="hidden" name="bus_type" value="{{$transaction_summary["bus_type"]}}">
                      <input type="hidden" name="from" value="{{$transaction_summary["from"]}}">
                      <input type="hidden" name="to" value="{{$transaction_summary["to"]}}">
                      <input type="hidden" name="date" value="{{$transaction_summary["date"]}}">
                      <input type="hidden" name="reporting" value="{{$transaction_summary["reporting"]}}">
                      <input type="hidden" name="departure" value="{{$transaction_summary["departure"]}}">
                      <input type="hidden" name="ticket_count" value="{{$transaction_summary["ticket_count"]}}">
                      <input type="hidden" name="total_fare" value="{{$transaction_summary["total_fare"]}}">
                      <input type="hidden" name="processing_fee" value="{{$transaction_summary["processing_fee"]}}">
                      <input type="hidden" name="total_amount" value="{{$transaction_summary["total_amount"]}}">

                    <div class="">
                      <table class="table table-striped" width="400">
                        <tbody>
                          <tr>
                            <th>Full Name:</th>
                            <td>{{$transaction_summary["full_name"]}}</td>
                          </tr>
                          <tr>
                            <th>Contact:</th>
                            <td>{{$transaction_summary["contact"]}}</td>
                          </tr>
                          <tr>
                            <th>Emergency Contact:</th>
                            <td>{{$transaction_summary["e_contact"]}}</td>
                          </tr>
                          <tr>
                            <th>Email:</th>
                            <td>{{$transaction_summary["email"]}}</td>
                          </tr>
                          <tr>
                            <th>Bus Operator:</th>
                            <td>{{$transaction_summary["operator"]}}</td>
                          </tr>
                          <tr>
                            <th>Bus Type:</th>
                            <td>{{$transaction_summary["bus_type"]}}</td>
                          </tr>
                          <tr>
                            <th>Journey:</th>
                            <td>From <strong>{{$transaction_summary["from"]}}</strong>  to <strong>{{$transaction_summary["to"]}}</strong> </td>
                          </tr>
                          <tr>
                            <th>Travel Date:</th>
                            <td>{{\Carbon\Carbon::createFromTimeStamp(strtotime($transaction_summary["date"]))->toFormattedDateString()}}</td>
                          </tr>
                          <tr>
                            <th>Reporting Time:</th>
                            <td>{{$transaction_summary["reporting"]}}</td>
                          </tr>
                          <tr>
                            <th>Departure Time:</th>
                            <td>{{$transaction_summary["departure"]}}</td>
                          </tr>
                          <tr>
                            <th>No. of Tickets:</th>
                            <td>{{$transaction_summary["ticket_count"]}}</td>
                          </tr>
                          <tr>
                            <th>Total Bus Fare:</th>
                            <td>GHC {{$transaction_summary["total_fare"]}}.00</td>
                          </tr>
                          <tr>
                            <th>Our Charge:</th>
                            <td>GHC {{$transaction_summary["processing_fee"]}}</td>
                          </tr>
                          <tr>
                            <th>Total Amount:</th>
                            <th>GHC {{$transaction_summary["total_amount"]}}</th>
                          </tr>
                      <tbody>
                    </table>

                    <hr>
                    <p align="center"><input type="checkbox" name="" value="">&nbsp; Please accept our <a href="#">terms and conditions</a> and proceed to checkout</p>

                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-5 col-xs-6 col-xs-offset-4">
                              <!-- <button type="submit" class="btn btn-warning">
                                  CHECK OUT
                              </button> -->
                              <!-- Large modal -->
                                <button type="submit" class="btn btn-warning" data-toggle="modal" data-target=".bs-example-modal-lg">CHECK OUT</button>

                                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                  <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title" id="myModalLabel">Reservation almost complete</h4>
                                    </div>
                                    <div class="modal-body">
                                      You will receive your ticket details via SMS shortly.
                                      <br>
                                      In order to finalise your reservation, kindly proceed to pay the
                                      cost to the number specified in the message.
                                      <br>
                                      Please call our customer care on 0550635126
                                      if you do not receive the SMS in less than 10 minutes.
                                      <br>
                                      <br>
                                      Thank you for using our service. Have a safe trip.
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                                      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                    </div>
                                    </div>
                                  </div>
                                </div>
                            <!-- /Large modal -->
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
<iframe name="hiddenFrame" width="0" height="0" border="0" style="display: none;"></iframe>
@endsection
