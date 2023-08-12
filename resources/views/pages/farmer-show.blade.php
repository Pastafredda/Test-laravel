@extends('layouts.main-layout')

@section('content')
    <h2><a href="{{ route('farmer-index') }}">HOME</a></h2>
    <ul class="list-unstyled">
        <li>Nome: {{ $farmer->name }}</li>
        <li>Cognome: {{ $farmer->lastname }}</li>
        <li>Data di nascita: {{ $farmer->dateOfBirth }}</li>
    </ul>
    @if (count($farmer->rabbits) > 0)
        <h3>Conigli in possesso: {{ count($farmer->rabbits) }}</h3>
        <ul class="list-unstyled">
            @foreach ($farmer->rabbits as $rabbit)
                <li><a href="{{ route('rabbit-show', $rabbit->id) }}">{{ $rabbit->name }}</a></li>
            @endforeach
        </ul>
    @else
        <h3>Non ha conigli</h3>
    @endif

    <h3>Fattorie: {{ count($farmer->farms) }}</h3>
    <ul class="list-unstyled">
        @foreach ($farmer->farms as $farm)
            <li>{{ $farm->location }} {{ $farm->nation }}</li>
        @endforeach
    </ul>

    <a class="btn btn-primary" href="{{ route('farmer-edit', $farmer->id) }}">UPDATE</a>
    <form class="d-inline" method="POST" action="{{ route('farmer-delete', $farmer->id) }}">
        @csrf
        @method('DELETE')
        <input class="btn btn-primary " type="submit" value="DELETE">
    </form>

@endsection
