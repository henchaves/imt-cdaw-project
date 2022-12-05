<style>
    .text-shadow {
        text-shadow: 2px 4px 3px rgba(0, 0, 0, 0.5);
    }

    a {
        text-decoration: none;
    }

    a:hover {
        color: #FFF;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<div id="home-carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#home-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#home-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#home-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{asset('images/pokemon-carousel-01.png')}}" class="d-block w-100" alt="...">
            <a href="{{ url('/login') }}" class="carousel-caption d-none d-md-block">
                <h5 class="text-shadow">Don't miss out on the fun!</h5>
                <p class="text-shadow">Join the Pokémon Battles today!</p>
            </a>
        </div>
        <div class="carousel-item">
            <img src="{{asset('images/pokemon-carousel-02.png')}}" class="d-block w-100" alt="...">
            <a href="{{ url('/players') }}" class="carousel-caption d-none d-md-block">
                <h5 class="text-shadow">Compete with other players!</h5>
                <p class="text-shadow">Be the best Pokémon trainer!</p>
            </a>
        </div>
        <div class="carousel-item">
            <img src="{{asset('images/pokemon-carousel-03.png')}}" class="d-block w-100" alt="...">
            <a href="{{ url('/pokemons') }}" class="carousel-caption d-none d-md-block">
                <h5 class="text-shadow">Discover new Pokémons!</h5>
                <p class="text-shadow">See what Pokémons you can catch!</p>
            </a>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#home-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#home-carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
</div>