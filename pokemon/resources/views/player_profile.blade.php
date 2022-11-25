@extends('template')

@section('content')
<h2>Player Profile:</h2>
<ul>
  <li><b>Username: </b>{{$player->name}}</li>
  <li><b>Level: </b>{{$player->level}}</li>
  <li><b>Victories: </b>{{$player->victories}}</li>
</ul>

<h4>Player's Games:</h4>
{{$player->combats}}
@endsection
