@extends('template')

@section('title', 'Players')

@section('css')
<link rel="stylesheet" href="{{asset('css/players.css')}}">
@endsection

@section('content')
<header>
  <x-navbar />
</header>

<main class="container">
  <h3>Players</h3>
  {{$players}}
</main>
@endsection