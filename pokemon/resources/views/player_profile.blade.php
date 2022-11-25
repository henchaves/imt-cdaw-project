@extends('template')

@section('content')
<h3>Player Profile:</h3>
<ul>
  <li><b>Username: </b>{{$player->name}}</li>
  <li><b>Level: </b>{{$player->level}}</li>
  <li><b>Victories: </b>{{$player->victories}}</li>


</ul>
{{$player}}
@endsection
