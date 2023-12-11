@extends('layout.base')

@section('content')
    <div id="app">
        <booking-live :bookings="{{$bookings}}"></booking-live>
    </div>
@stop

