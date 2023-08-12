@extends('layouts.main-layout')

@section('content')
    <h1>Update Rabbit</h1>

    <form method="POST" action="{{ route('rabbit-update', $rabbit->id) }}">

        @csrf
        @method('PUT')

        <label for="name">Nome</label>
        <br>
        <input type="text" name="name" id="name" value="{{ $rabbit->name }}">
        <br>
        @error('name')
            <div>{{ $message }}</div>
        @enderror
        <label for="code">Codice</label>
        <br>
        <input type="text" name="code" id="code" value="{{ $rabbit->code }}">
        <br>
        @error('code')
            <div>{{ $message }}</div>
        @enderror
        <label for="weight">Peso</label>
        <br>
        <input type="number" name="weight" id="weight" value="{{ $rabbit->weight }}">
        <br>
        @error('weight')
            <div>{{ $message }}</div>
        @enderror

        <select name="farmer_id" id="farmer_id">
            @foreach ($farmers as $farmer)
                <option value="{{ $farmer->id }}" @selected($rabbit->farmer->id === $farmer->id)>

                    {{ $farmer->name }}
                    {{ $farmer->lastname }}
                </option>
            @endforeach
        </select>
        <input class="my-3" type="submit" value="Create">


    </form>
@endsection
