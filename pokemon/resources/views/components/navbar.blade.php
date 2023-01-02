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
            <div class="login-logout-button-wrapper d-flex flex-column">
            </div>
            <!-- <div class="logout-button-wrapper d-flex flex-column" hidden>
                <p class="text-white login-status">
                    Logged in as <span class="text-warning">Player</span>
                </p>
                <a class="btn btn-bd-primary" href="{{ url('/logout') }}">Logout</a>
            </div>
            <div class="login-button-wrapper d-flex flex-column" hidden>
                <p class="text-white login-status">
                    You are not logged in!
                </p>
                <a class="btn btn-bd-primary" href="{{ url('/login') }}">Login or Register</a>
            </div> -->
            <hr>
        </div>
    </div>

</nav>

<script>
    const buttonDiv = document.querySelector('.login-logout-button-wrapper');
    const tokenKey = "POKEMON_BATTLES_USER_JWT"
    const token = localStorage.getItem(tokenKey);

    fetch(`api/checktoken/${token}`)
        .then(response => {
            if (response.status == 200) {
                buttonDiv.innerHTML = `
                    <p class="text-white login-status">
                        Logged in as <span class="text-success" id="username-span" style="color:#F2798C;"></span>
                    </p>
                    <a class="btn btn-bd-primary" href="{{ url('/play') }}">Play</a>
                    <p class="login-status">
                        <a id="logout-button-nav" class="link-danger">Logout from account</a>
                    </p>
                    
                `;

                const logoutButton = document.querySelector('#logout-button-nav');

                logoutButton.addEventListener('click', () => {
                    fetch(`api/logout/${token}`)
                        .then(response => {
                            if (response.status == 200) {
                                localStorage.removeItem(tokenKey);
                                window.location.href = "/";
                            }
                        })
                        .catch(error => {
                            console.log(error);
                        });
                });
            } else {
                buttonDiv.innerHTML = `
                    <p class="text-white login-status">
                        You are not logged in!
                    </p>
                    <a id="login-button-nav" class="btn btn-bd-primary" href="{{ url('/login') }}">Login or Register</a>
                `;
            }

            return response.json();
        }).then(data => {
            const usernameSpan = document.querySelector('#username-span');
            usernameSpan.innerHTML = data.user.name;
        })
        .catch(error => {
            console.log(error);
        });
</script>