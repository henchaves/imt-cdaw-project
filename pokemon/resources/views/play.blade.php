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
      <div class="col-12 col-md-4">
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
      <div class="col-12 col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Historical battles</h5>
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">Battle ID</th>
                    <th scope="col">Opponent</th>
                    <th scope="col">Result</th>
                  </tr>
                </thead>
                <tbody id="battles-table-body">
                </tbody>
              </table>
            </div>
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