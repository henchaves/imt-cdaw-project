@extends('template')

@section('title', 'Log In')

@section('css')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
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
      </div>
    </div>
  </nav>
</header>

<main class="container">
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      <div class="card border-0 shadow rounded-3 my-5">
        <div class="card-body p-4 p-sm-5">
          <h5 class="card-title text-center mb-5 fw-light fs-5">Log In</h5>
          <form>
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Password</label>
            </div>
            <div class="d-grid">
              <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign
                in</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
  @endsection