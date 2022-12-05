@extends('template')

@section('title', 'Player {{$player->name}}')

@section('content')
<h2>Player Profile:</h2>
<ul>
    <li><b>Username: </b>{{$player->name}}</li>
    <li><b>Level: </b>{{$player->level}}</li>
    <li><b>Victories: </b>{{$player->victories}}</li>
    <li>
        <b>Energies: </b>
        <ul>
            @foreach($player->energies as $energy)
            <li>{{$energy->energy->name}}</li>
            @endforeach
        </ul>
    </li>
</ul>

<h4>Player's Games:</h4>
{{$player->combats}}
@endsection
