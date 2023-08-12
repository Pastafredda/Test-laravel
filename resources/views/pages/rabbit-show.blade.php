@extends('layouts.main-layout')

@section('content')
    <h2><a href="{{ route('rabbit-index') }}">HOME</a></h2>
    <h2>
        {{ $rabbit->name }} - {{ $rabbit->code }}- {{ $rabbit->weight }}g
    </h2>
    <h3>
        Proprietario : <a href="{{ route('farmer-show', $rabbit->farmer->id) }}">{{ $rabbit->farmer->name }}
            {{ $rabbit->farmer->lastname }}</a>
    </h3>

    <a class="btn btn-primary" href="{{ route('rabbit-edit', $rabbit->id) }}">Update</a>

    <form class="d-inline" method="POST" action="{{ route('rabbit-delete', $rabbit->id) }}">
        @csrf
        @method('DELETE')
        <input class="btn btn-primary " type="submit" value="DELETE">
    </form>
@endsection
