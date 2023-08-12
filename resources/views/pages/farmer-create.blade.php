@extends('layouts.main-layout')

@section('content')
    <h2>Nuovo proprietario </h2>

    <form method="POST" action="{{ route('farmer-store') }}">
        @csrf
        @method('POST')

        <label for="name">Nome</label>
        <br>
        <input type="text" name="name" id="name">
        <br>
        <label for="lastname">Cognome</label>
        <br>
        <input type="text" name="lastname" id="lastname">
        <br>
        <label for="dateOfBirth">Data di Nascita</label>
        <br>
        <input type="date" name="dateOfBirth" id="dateOfBirth">
        <br>
        <br>

        <ul class="list-unstyled">
            @foreach ($farms as $farm)
                <li>
                    <input name="farms[]" value="{{ $farm->id }}" type="checkbox">
                    <label for="checkbox">{{ $farm->location }} ({{ $farm->nation }})</label>
                </li>
            @endforeach
        </ul>

        <input class="my-3" type="submit" value="Create">
    </form>
@endsection
