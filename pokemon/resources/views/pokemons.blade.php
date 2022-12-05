@extends('template')

@section('title', 'Pokémons')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
@endsection

@section('content')
<h1>Pokémons:</h1>

<table class="table" id="pokemonsTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Energy</th>
            <th>Level</th>
            <th>HP</th>
            <th>Normal Damage</th>
            <th>Special Damage</th>
            <th>Special Defense</th>
            <th>Image</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pokemons as $pokemon)
        <tr>
            <td>{{$pokemon->id}}</td>
            <td>{{$pokemon->name}}</td>
            <td>{{$pokemon->energy->name}}</td>
            <td>{{$pokemon->level}}</td>
            <td>{{$pokemon->max_health_points}}</td>
            <td>{{$pokemon->normal_damage}}</td>
            <td>{{$pokemon->special_damage}}</td>
            <td>{{$pokemon->special_defense}}</td>
            <td><img src="{{$pokemon->image_url}}" width="50px" height="50px" /></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script src="{{ asset('/js/pokemonsDataTable.js') }}"></script>
@endsection
