@extends('layouts.main-layout')

@section('content')
    <h2>Modifica proprietario </h2>

    <form method="POST" action="{{ route('farmer-update', $farmer->id) }}">
        @csrf
        @method('PUT')

        <label for="name">Nome</label>
        <br>
        <input type="text" name="name" id="name" value="{{ $farmer->name }}">
        <br>
        <label for="lastname">Cognome</label>
        <br>
        <input type="text" name="lastname" id="lastname" value="{{ $farmer->lastname }}">
        <br>
        <label for="dateOfBirth">Data di Nascita</label>
        <br>
        <input type="date" name="dateOfBirth" id="dateOfBirth" value="{{ $farmer->dateOfBirth }}">
        <br>
        <br>

        <ul class="list-unstyled">
            @foreach ($farms as $farm)
                <li>
                    <input name="farms[]" value="{{ $farm->id }}" type="checkbox"
                        @foreach ($farmer->farms as $farmerFarm)
                            @checked($farmerFarm->id === $farm->id) @endforeach>
                    <label for="checkbox">{{ $farm->location }} ({{ $farm->nation }})</label>
                </li>
            @endforeach
        </ul>

        <input class="my-3" type="submit" value="Update">
    </form>
@endsection
