@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Welcome <i>{{Auth::user()->company_name}} </i></strong></div>

                <div class="panel-body">
                     {{ Auth::user()->company_name }}'s Dashboard
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
