@extends('layouts.main-layout')

@section('content')
    <h2>Proprietari <a class="btn btn-primary" href="{{ route('farmer-create') }}">Nuovo</a></h2>
    <h2>Ritorna alla pagina dei <a href="{{ route('rabbit-index') }}">conigli</a></h2>

    <ul class="list-unstyled">
        @foreach ($farmers as $farmer)
            <li><a href="{{ route('farmer-show', $farmer->id) }}"> {{ $farmer->name }}
                    {{ $farmer->lastname }}</a></li>
        @endforeach
    </ul>
@endsection
