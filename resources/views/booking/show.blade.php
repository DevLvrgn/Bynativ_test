@extends('layout.base')

@section('content')
    <div class="mt-5">

        <div class="mb-2 p-2 bg-light">
            <h2>Consultation de votre réservation</h2>
            <span class="">Faite le {{$booking->created_at->format('d/m/Y')}} à {{$booking->created_at->format('H:i')}}</span>
        </div>

        <a href="{{route('booking.index')}}">Retourner au formulaire</a>

        <div class="form-group">
            <label for="name">Nom pour la réservation</label>
            <input disabled name="name" type="text" class="form-control" id="name" placeholder="Enter name" value="{{ $booking->name }}">
        </div>

        <div class="form-group mt-2">
            <label for="email">Adresse email</label>
            <input disabled name="email" type="email" class="form-control" id="email" placeholder="Enter email" value="{{ $booking->email }}">
        </div>

        <div class="form-group mt-2">
            <label for="date">Date et Heure du Rendez-vous</label>
            <input type="datetime-local" id="date" name="date" class="form-control" disabled value="{{ $booking->date }}">
        </div>

        <div class="form-group mt-2">
            <label for="phone_number">Numéro de téléphone renseigné</label>
            <input disabled name="phone_number" type="text" class="form-control" id="phone_number" placeholder="Enter phone number in french format" value="{{ $booking->phone_number }}">
        </div>

        <div class="form-group mt-2">
            <label for="message">Message</label>
            <textarea disabled name="message" class="form-control" id="message" rows="3" >{{$booking->message}}</textarea>
        </div>
    </div>

@stop

