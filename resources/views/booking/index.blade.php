@extends('layout.base')

@section('content')

    @if(session('success') && session('id'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            <div>
                <span>{{session('success')}}</span>
                <a href="{{ route('booking.show', session('id')) }}">
                    Consulter votre demande de rendez-vous
                </a>
            </div>
            <button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form action="{{ route('booking.create') }}" method="POST" class="mt-4">
        @csrf

        <div class="mb-2 bg-light p-2">
            <h2>Création d'un RDV </h2>
        </div>

        <div class="bg-light p-3">
            <a class="d-block" target="_blank" href="{{ route('booking.live') }}">
                Voir la page Live
            </a>

            <a class="d-block" target="_blank" href="{{ route('api.booking.index') }}">
                Tester la partie API
            </a>
        </div>

        <div class="form-group">
            <label for="name">Entrez votre nom</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Enter name" value="{{old('name')}}">
            @error('name')
                <div class="text-danger mb-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-2">
            <label for="email">Entrez votre adresse email</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="Enter email" value="{{old('email')}}">
            @error('email')
                <div class="text-danger mb-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-2">
            <label for="date">Date et Heure du Rendez-vous</label>
            <input type="datetime-local" id="date" name="date" class="form-control" required value="{{old('date')}}">
        </div>
        @error('date')
            <div class="text-danger mb-2">{{ $message }}</div>
        @enderror

        <div class="form-group mt-2">
            <label for="phone_number">Entrez votre numéro de téléphone</label>
            <input name="phone_number" type="text" class="form-control" id="phone_number" placeholder="Enter phone number in french format" value="{{old('phone_number')}}">
            @error('phone_number')
                <div class="text-danger mb-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-2">
            <label for="message">Message</label>
            <textarea name="message" class="form-control" id="message" rows="3" >{{old('message')}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>

@stop

