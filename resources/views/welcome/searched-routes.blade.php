@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 col-xs-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('/route/search/') }}">
                      {{ csrf_field() }}
                      {{ method_field('POST') }}
                   <div class="row">
                     <div class="col-md-3 col-sm-3 col-xs-6">
                       <!-- <input id="from" type="text" class="form-control" name="from" placeholder="From"> -->
                       <select class="form-control" name="from" required>
                         <option value="">Leaving From</option>
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
                     <div class="col-md-3 col-sm-3 col-xs-6">
                       <select class="form-control" name="to" required>
                         <option value="">Travelling To</option>
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
                     <div class="col-md-3 col-sm-3 col-xs-12">
                       <div class="bootstrap-iso">
                       <div class="input-group input-append date" id="datePicker">
                         <input class="form-control" id="date" name="date" placeholder="Date" type="date"/>
                         <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                       </div>
                       </div>
                     </div>

                     <!-- <div class="row"> -->
                     <div class="col-md-3 col-sm-3 col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block">
                            Search Route
                        </button>
                     </div>
                   <!-- </div> -->
                 </form>
                </div>
              </div>

              @if (!empty($schedules))
                <div class="panel-body">
                  <p>Available bus(es) from
                    <strong><?php echo $fromTo['from'] ?></strong>
                     to
                    <strong><?php echo $fromTo['to'] ?></strong>
                    <strong>
                      <?php if ($fromTo['date'] == null) { echo ""; } else { echo "on ". $fromTo['date'];}
                      ?>
                    </strong>
                  </p>
                </div>

                <div class="table-responsive">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Bus Operator</th>
                        <th>Bus Type</th>
                        <th>Fare</th>
                        <th>Reporting</th>
                        <th>Departure</th>
                        <th>Tickets</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($schedules as $schedule)
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/reservations/create/') }}">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                        <input type="hidden" name="operator_id" value="{{$schedule->id}}">
                        <tr>
                          <td>{{\Carbon\Carbon::createFromTimeStamp(strtotime($schedule->date))->toFormattedDateString()}}</td>
                          <td>{{$schedule->from}}</td>
                          <td>{{$schedule->to}}</td>
                          <td>{{$schedule->company_name}}</td>
                          <td>{{$schedule->bus_type}}</td>
                          <td>GHC {{$schedule->fare}}.00</td>
                          <!-- <input type="hidden" name="fare" value="{{$schedule->fare}}"> -->
                          <td>{{$schedule->reporting}}</td>
                          <td>{{$schedule->departure}}</td>
                          <td><input type="number" style="width:40px;" value="1" min="1" step="1" name="ticket_count"></td>
                          <!-- <td> <a href="{{ url('/reservations/create/'. $schedule->id) }}">Book<a></td> -  -->
                          <td><button type="submit" class="btn btn-warning btn-sm">
                              Book
                          </button></td>
                        </tr>
                     </form>
                    @endforeach
                    <tbody>
                  </table>
                </div>
                @else
                <div class="panel-body">
                  <p>Sorry, No bus is available from <strong><?php echo $fromTo['from'] ?></strong> to <strong><?php echo $fromTo['to'] ?></strong> <strong> <?php if ($fromTo['date'] == null) { echo ""; } else { echo "on ". $fromTo['date'];} ?> </strong></p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
