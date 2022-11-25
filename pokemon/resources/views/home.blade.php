@extends('template')

@section('css')
<link rel="stylesheet" href="{{asset('css/home.css')}}">
@endsection

@section('content')
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-pink">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('/') }}">Pokémon Battles</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/howtoplay') }}">How to play</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/players') }}">Leaderboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/pokemons') }}">Pokémons</a>
          </li>
        </ul>
        <div class="login-button-wrapper d-flex flex-column">
          <p class="text-white login-status">
            You are not logged in
          </p>
          <a class="btn btn-bd-primary" href="{{ url('/login') }}">Login</a>
        </div>
      </div>
    </div>
  </nav>
</header>


<main>
  <!-- create a carousel using bootstrap -->
  <div id="home-carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#home-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#home-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#home-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('images/pokemon-carousel-01.png')}}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{asset('images/pokemon-carousel-02.png')}}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{asset('images/pokemon-carousel-03.png')}}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#home-carousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#home-carousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
</main>
@endsection

@section('js')
<script src="{{asset('js/home.js')}}"></script>
@endsection