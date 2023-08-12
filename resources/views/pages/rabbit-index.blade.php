@extends('layouts.main-layout')

@section('content')
    <h2>Conigli <a class="btn btn-primary" href="{{ route('rabbit-create') }}">Nuovo</a></h2>
    <h3>Qui puoi andare alla pagina dei <a href="{{ route('farmer-index') }}">Proprietari</a></h3>



    <ul class="list-unstyled">
        @foreach ($rabbits as $rabbit)
            <li>
                <a href="{{ route('rabbit-show', $rabbit->id) }}">{{ $rabbit->name }}</a>
            </li>
        @endforeach
    </ul>
@endsection
