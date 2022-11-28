@extends('template')

@section('content')
<h2>Combat Stats:</h2>
<ul>
  <li><b>ID: </b>{{$combat->id}}</li>
  <li><b>Combat Type: </b>{{$combat->combat_type->name}}</li>
  <li><b>Winner ID: </b>{{$combat->winner_id}}</li>
  <li><b>Loser ID: </b>{{$combat->loser_id}}</li>
</ul>

<h4>Combat's Players:</h4>
{{$combat->players}}

<h4>Combat's Rounds:</h4>
@foreach($combat->rounds as $round)
  <ul>
    <li><b>Round ID: </b>{{$round->id}}</li>
    <li><b>Player Name: </b>{{$round->player->name}}</li>
    <li><b>Pokemon Name: </b>{{$round->pokemon->name}}</li>
    <li><b>Order: </b>{{$round->order}}</li>
  </ul>
@endforeach
@endsection
