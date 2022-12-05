@extends('template')

@section('title', 'Pokémons')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<link rel="stylesheet" href="{{asset('css/pokemons.css')}}">
@endsection

@section('content')
<header>
    <x-navbar />
</header>

<main class="container">
    <div>
        <h3 class="text-center">Pokémons Table</h3>
        <p class="text-center">Check out the table below to see all the Pokémons available in the game.</p>
    </div>

    <table class="table table-striped" id="pokemonsTable">
        <thead>
            <tr>
                <th hidden>ID</th>
                <th data-orderable="false"></th>
                <th class="align-middle">Name</th>
                <th class="align-middle">Energy</th>
                <th class="align-middle">Level</th>
                <th class="align-middle">HP</th>
                <th class="align-middle text-center">Normal Damage</th>
                <th class="align-middle text-center">Special Damage</th>
                <th class="align-middle text-center">Special Defense</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pokemons as $pokemon)
            <tr>
                <td hidden>{{$pokemon->id}}</td>
                <td><img src="{{$pokemon->image_url}}" width="75px" height="75px" /></td>
                <td class="align-middle">{{ucfirst($pokemon->name)}}</td>
                <td class="align-middle">{{ucfirst($pokemon->energy->name)}}</td>
                <td class="align-middle">{{$pokemon->level}}</td>
                <td class="align-middle">{{$pokemon->max_health_points}}</td>
                <td class="align-middle text-center">{{$pokemon->normal_damage}}</td>
                <td class="align-middle text-center">{{$pokemon->special_damage}}</td>
                <td class="align-middle text-center">{{$pokemon->special_defense}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script src="{{ asset('/js/pokemonsDataTable.js') }}"></script>
@endsection