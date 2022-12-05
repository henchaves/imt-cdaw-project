<!-- add style -->
<style>
    .navbar {
        background-color: #DD7EE6;
    }

    .navbar .btn-bd-primary {
        --bs-btn-font-weight: 600;
        --bs-btn-color: #FFF;
        --bs-btn-border-color: #FFF;
        --bs-btn-border-radius: .3rem;
        --bs-btn-hover-color: #F2798C;
        --bs-btn-hover-bg: #FFF;
        --bs-btn-hover-border-color: #FFF;
        --bs-btn-active-color: #F2798C;
        --bs-btn-active-bg: #FFF;
    }

    .navbar .login-status {
        color: #FFF;
        font-size: 0.75rem;
        font-weight: 600;
        text-align: center;
        margin: 0.25rem 0;
    }
</style>


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
                    You are not logged in!
                </p>
                <a class="btn btn-bd-primary" href="{{ url('/login') }}">Login or Register</a>
            </div>
            <hr>
        </div>
    </div>
</nav>