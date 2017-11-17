@extends('layouts.app')

@section('style')
  <link rel="stylesheet" href="{{URL::To('css/main.css')}}">
@endsection

@section('content')
  <section class="intro">
    <div class="inner">
      <div class="row">
        <div class="col-sm-offset-4 col-sm-4 col-xs-offset-1 col-xs-10">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/route/search/') }}">
              {{ csrf_field() }}
              {{ method_field('POST') }}
              <select class="custom-select" name="from" required>
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

              <select class="custom-select" name="to" required>
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

              <div class="bootstrap-iso">
              <div class="input-group input-append date" id="datePicker">
                <input class="form-control" id="date" name="date" placeholder="Date" required/>
                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
              </div>
              </div>

              <hr>

              <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>
        <!-- <h1> <span style="color: #ff9b5f;">TICKET</span><span style="color: #fff;">AFRIQ.COM</span></h1> -->
      </div>
    </div>
  </section>
@endsection
