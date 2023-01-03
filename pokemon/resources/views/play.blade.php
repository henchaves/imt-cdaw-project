@extends('template')

@section('title', 'Play')

@section('css')
<link rel="stylesheet" href="{{asset('css/play.css')}}">
@endsection

@section('content')
<header>
  <x-navbar />
</header>

<main>
  <div class="container">
    <!-- Create sections: Player profile, historical battles, and play now -->
    <div class="row">
      <div class="col-12 col-md-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Player profile</h5>
            <p class="card-text">Username:
              <strong id="player-profile-username"></strong>
            </p>
            <p class="card-text">Wins:
              <strong id="player-profile-wins"></strong>
            </p>
            <p class="card-text">Level:
              <strong id="player-profile-level"></strong>
            </p>
            <p class="card-text">Mastered energies:
              <strong id="player-profile-energies"></strong>
            </p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-5">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Historical battles</h5>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Opponent</th>
                    <th scope="col">Result</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody id="battles-table-body">
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Play now</h5>
            <p class="card-text">Choose your opponent:</p>
            <div class="input-group mb-3">
              <select class="form-select" id="opponent-select">
              </select>
              <button class="btn btn-primary" type="button" id="play-button">Play</button>
            </div>
          </div>
        </div>
      </div>
</main>
@endsection

@section('js')
<script src=" {{asset('js/play.js')}}">
</script>
@endsection