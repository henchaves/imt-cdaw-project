@extends('template')

@section('title', 'Combat - Auto (Random)')

@section('css')
@endsection

@section('content')
<header>
  <x-navbar />
</header>

<main>
  <!-- update combat variable -->
  {{ \App\Http\Controllers\CombatController::update($combat->id, 2, 2) }}
  <h1>Combat - Auto (Random)</h1>
</main>
@endsection

@section('js')
<!-- <script src="{{asset('js/combat_auto_random.js')}}"></script> -->
@endsection