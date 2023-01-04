@extends('template')

@section('title', 'Combat - Auto (Random)')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/combat/auto-random.css') }}">
@endsection

@section('content')
    <header>
        <x-navbar />
    </header>

    <main class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Combat - Auto (Random)</h1>
                @php
                    $player1EnergyIds = array_unique($player1->energies->pluck('energy_id')->toArray());
                    $player1EnergyNames = [];
                    foreach ($player1EnergyIds as $energyId) {
                        $player1EnergyNames[] = \App\Models\Energy::find($energyId)->name;
                    }
                    
                    $player1PossiblePokemons = [];
                    foreach ($player1EnergyIds as $energyId) {
                        $player1PossiblePokemons = array_merge(
                            $player1PossiblePokemons,
                            \App\Models\Pokemon::where('energy_id', $energyId)
                                ->get()
                                ->toArray(),
                        );
                    }
                    $player1PossiblePokemons = array_filter($player1PossiblePokemons, function ($pokemon) use ($player1) {
                        return $pokemon['level'] <= $player1->level();
                    });
                    
                    $player2EnergyIds = array_unique($player2->energies->pluck('energy_id')->toArray());
                    $player2EnergyNames = [];
                    foreach ($player2EnergyIds as $energyId) {
                        $player2EnergyNames[] = \App\Models\Energy::find($energyId)->name;
                    }
                    
                    $player2PossiblePokemons = [];
                    foreach ($player2EnergyIds as $energyId) {
                        $player2PossiblePokemons = array_merge(
                            $player2PossiblePokemons,
                            \App\Models\Pokemon::where('energy_id', $energyId)
                                ->get()
                                ->toArray(),
                        );
                    }
                    $player2PossiblePokemons = array_filter($player2PossiblePokemons, function ($pokemon) use ($player2) {
                        return $pokemon['level'] <= $player2->level();
                    });
                    $player1Pokemons = array_rand($player1PossiblePokemons, 3);
                    $player1Pokemons = array_map(function ($pokemon) use ($player1PossiblePokemons) {
                        return $player1PossiblePokemons[$pokemon];
                    }, $player1Pokemons);
                    
                    $player2Pokemons = array_rand($player2PossiblePokemons, 3);
                    $player2Pokemons = array_map(function ($pokemon) use ($player2PossiblePokemons) {
                        return $player2PossiblePokemons[$pokemon];
                    }, $player2Pokemons);
                @endphp
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Player 1</h3>
                        <hr>
                        <div>
                            <p class="pokemon-attribute">Username: <strong>{{ $player1->name }}</strong></p>
                            <p class="pokemon-attribute">Level: <strong>{{ $player1->level() }}</strong></p>
                            <p class="pokemon-attribute">Mastered Energies:
                                <strong>{{ implode(', ', $player1EnergyNames) }}</strong>
                            </p>

                        </div>
                        <br>
                        <h5 class="text-center">Drafted Pokémons</h5>
                        <div class="card" id="player-1-pokemon-1">
                            <div class="card-header">
                                <img src="{{ $player1Pokemons[0]['image_url'] }}" alt="{{ $player1Pokemons[0]['name'] }}"
                                    height="50" width="50">
                                <span>{{ strtoupper($player1Pokemons[0]['name']) }}</span>
                            </div>
                            <div class="card-body">
                                <p class="pokemon-attribute">Level: <strong>{{ $player1Pokemons[0]['level'] }}</strong></p>

                                <p class="pokemon-attribute">Energy:
                                    <strong>{{ \App\Models\Energy::find($player1Pokemons[0]['energy_id'])->name }}</strong>
                                </p>
                                <p class="pokemon-attribute">HP: <b>{{ $player1Pokemons[0]['max_health_points'] }}</b></p>
                                <p class="pokemon-attribute">Attack: <b>{{ $player1Pokemons[0]['normal_damage'] }}</b></p>
                                <p class="pokemon-attribute">Special Attack:
                                    <b>{{ $player1Pokemons[0]['special_damage'] }}</b>
                                </p>
                                <p class="pokemon-attribute">Special Defense:
                                    <b>{{ $player1Pokemons[0]['special_defense'] }}</b>
                                </p>
                            </div>

                        </div>
                        <br>
                        <div class="card" id="player-1-pokemon-2">
                            <div class="card-header">
                                <img src="{{ $player1Pokemons[1]['image_url'] }}" alt="{{ $player1Pokemons[1]['name'] }}"
                                    height="50" width="50">
                                <span>{{ strtoupper($player1Pokemons[1]['name']) }}</span>
                            </div>
                            <div class="card-body">
                                <p class="pokemon-attribute">Level: <strong>{{ $player1Pokemons[1]['level'] }}</strong></p>

                                <p class="pokemon-attribute">Energy:
                                    <strong>{{ \App\Models\Energy::find($player1Pokemons[1]['energy_id'])->name }}</strong>
                                </p>
                                <p class="pokemon-attribute">HP: <b>{{ $player1Pokemons[1]['max_health_points'] }}</b></p>
                                <p class="pokemon-attribute">Attack: <b>{{ $player1Pokemons[1]['normal_damage'] }}</b></p>
                                <p class="pokemon-attribute">Special Attack:
                                    <b>{{ $player1Pokemons[1]['special_damage'] }}</b>
                                </p>
                                <p class="pokemon-attribute">Special Defense:
                                    <b>{{ $player1Pokemons[1]['special_defense'] }}</b>
                                </p>
                            </div>
                        </div>
                        <br>
                        <div class="card" id="player-1-pokemon-3">
                            <div class="card-header">
                                <img src="{{ $player1Pokemons[2]['image_url'] }}" alt="{{ $player1Pokemons[2]['name'] }}"
                                    height="50" width="50">
                                <span>{{ strtoupper($player1Pokemons[2]['name']) }}</span>
                            </div>
                            <div class="card-body">
                                <p class="pokemon-attribute">Level: <strong>{{ $player1Pokemons[2]['level'] }}</strong></p>

                                <p class="pokemon-attribute">Energy:
                                    <strong>{{ \App\Models\Energy::find($player1Pokemons[2]['energy_id'])->name }}</strong>
                                </p>
                                <p class="pokemon-attribute">HP: <b>{{ $player1Pokemons[2]['max_health_points'] }}</b></p>
                                <p class="pokemon-attribute">Attack: <b>{{ $player1Pokemons[2]['normal_damage'] }}</b></p>
                                <p class="pokemon-attribute">Special Attack:
                                    <b>{{ $player1Pokemons[2]['special_damage'] }}</b>
                                </p>
                                <p class="pokemon-attribute">Special Defense:
                                    <b>{{ $player1Pokemons[2]['special_defense'] }}</b>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Battle Log</h5>
                            <hr>
                            <div>
                                @php
                                    $finished = false;
                                    $victory = 0;
                                    $currentPokemonPlayer1Index = 0;
                                    $currentPokemonPlayer1 = $player1Pokemons[$currentPokemonPlayer1Index];
                                    $currentPokemonPlayer2Index = 0;
                                    $currentPokemonPlayer2 = $player2Pokemons[$currentPokemonPlayer2Index];
                                    
                                    $normal_damage = 0;
                                    $special_damage = 0;
                                    $special_defense = 0;
                                    
                                    // Battle loop
                                    while (!$finished) {
                                        // Player 1 attacks
                                        $normal_damage = rand(1, 3) * $currentPokemonPlayer1['normal_damage'];
                                        echo $currentPokemonPlayer1['name'] . ' (P1) attacks ' . $currentPokemonPlayer2['name'] . ' (P2) with ' . $normal_damage . ' damage!' . '<br>';
                                        $currentPokemonPlayer2['max_health_points'] -= $normal_damage;
                                        echo $currentPokemonPlayer2['name'] . ' (P2) has ' . $currentPokemonPlayer2['max_health_points'] . ' HP left!' . '<br>';
                                        $special_damage = rand(0, 2) * $currentPokemonPlayer1['special_damage'];
                                        echo $currentPokemonPlayer1['name'] . ' (P1) attacks ' . $currentPokemonPlayer2['name'] . ' (P2) with ' . $special_damage . ' damage (special)!' . '<br>';
                                        $currentPokemonPlayer2['max_health_points'] -= $special_damage;
                                        echo $currentPokemonPlayer2['name'] . ' (P2) has ' . $currentPokemonPlayer2['max_health_points'] . ' HP left!' . '<br>';
                                    
                                        // Player 2 attacks
                                        $normal_damage = rand(1, 3) * $currentPokemonPlayer2['normal_damage'];
                                        echo $currentPokemonPlayer2['name'] . ' (P2) attacks ' . $currentPokemonPlayer1['name'] . ' (P1) with ' . $normal_damage . ' damage!' . '<br>';
                                        $currentPokemonPlayer1['max_health_points'] -= $normal_damage;
                                        echo $currentPokemonPlayer1['name'] . ' (P1) has ' . $currentPokemonPlayer1['max_health_points'] . ' HP left!' . '<br>';
                                        $special_damage = rand(0, 1) * $currentPokemonPlayer2['special_damage'];
                                        echo $currentPokemonPlayer2['name'] . ' (P2) attacks ' . $currentPokemonPlayer1['name'] . ' (P1) with ' . $special_damage . ' damage (special)!' . '<br>';
                                        $currentPokemonPlayer1['max_health_points'] -= $special_damage;
                                        echo $currentPokemonPlayer1['name'] . ' (P1) has ' . $currentPokemonPlayer1['max_health_points'] . ' HP left!' . '<br>';
                                    
                                        // Check if a pokemon is dead
                                        if ($currentPokemonPlayer1['max_health_points'] <= 0) {
                                            echo $currentPokemonPlayer1['name'] . ' (P1) is dead!' . '<br>';
                                            $currentPokemonPlayer1Index++;
                                            if ($currentPokemonPlayer1Index >= count($player1Pokemons)) {
                                                $finished = true;
                                                $victory = 2;
                                                echo 'Player 2 wins!' . '<br>';
                                            } else {
                                                $currentPokemonPlayer1 = $player1Pokemons[$currentPokemonPlayer1Index];
                                                echo $currentPokemonPlayer1['name'] . ' (P1) is now active!' . '<br>';
                                            }
                                        } else {
                                            // regenerate life with special defense
                                            // echo $currentPokemonPlayer1['name'] . ' (P1) regenerates ' . $currentPokemonPlayer1['special_defense'] . ' life!' . '<br>';
                                            // $currentPokemonPlayer1['max_health_points'] += $currentPokemonPlayer1['special_defense'];
                                            // echo $currentPokemonPlayer1['name'] . ' (P1) has ' . $currentPokemonPlayer1['max_health_points'] . ' life left!' . '<br>';
                                        }
                                        if ($currentPokemonPlayer2['max_health_points'] <= 0) {
                                            echo $currentPokemonPlayer2['name'] . ' (P2) is dead!' . '<br>';
                                            $currentPokemonPlayer2Index++;
                                            if ($currentPokemonPlayer2Index >= count($player2Pokemons)) {
                                                $finished = true;
                                                $victory = 1;
                                                echo 'Player 1 wins!' . '<br>';
                                            } else {
                                                $currentPokemonPlayer2 = $player2Pokemons[$currentPokemonPlayer2Index];
                                                echo $currentPokemonPlayer2['name'] . ' (P2) is now active!' . '<br>';
                                            }
                                        } else {
                                            // regenerate life with special defense
                                            //echo $currentPokemonPlayer2['name'] . ' (P2) regenerates ' . $currentPokemonPlayer2['special_defense'] . ' HP!';
                                            //$currentPokemonPlayer2['max_health_points'] += $currentPokemonPlayer2['special_defense'];
                                            //echo $currentPokemonPlayer2['name'] . ' (P2) has ' . $currentPokemonPlayer2['max_health_points'] . ' HP left!';
                                        }
                                    }
                                @endphp
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Player 2</h3>
                        <hr>
                        <div>
                            <p class="pokemon-attribute">Username: <strong>{{ $player2->name }}</strong></p>
                            <p class="pokemon-attribute">Level: <strong>{{ $player2->level() }}</strong></p>
                            <p class="pokemon-attribute">Mastered Energies:
                                <strong>{{ implode(', ', $player2EnergyNames) }}</strong>
                            </p>

                        </div>
                        <br>
                        <h5 class="text-center">Drafted Pokémons</h5>
                        <div class="card" id="player-2-pokemon-1">
                            <div class="card-header">
                                <img src="{{ $player2Pokemons[0]['image_url'] }}" alt="{{ $player2Pokemons[0]['name'] }}"
                                    height="50" width="50">
                                <span>{{ strtoupper($player2Pokemons[0]['name']) }}</span>
                            </div>
                            <div class="card-body">
                                <p class="pokemon-attribute">Level: <strong>{{ $player2Pokemons[0]['level'] }}</strong>
                                </p>

                                <p class="pokemon-attribute">Energy:
                                    <strong>{{ \App\Models\Energy::find($player2Pokemons[0]['energy_id'])->name }}</strong>
                                </p>
                                <p class="pokemon-attribute">HP: <b>{{ $player2Pokemons[0]['max_health_points'] }}</b>
                                </p>
                                <p class="pokemon-attribute">Attack: <b>{{ $player2Pokemons[0]['normal_damage'] }}</b>
                                </p>
                                <p class="pokemon-attribute">Special Attack:
                                    <b>{{ $player2Pokemons[0]['special_damage'] }}</b>
                                </p>
                                <p class="pokemon-attribute">Special Defense:
                                    <b>{{ $player2Pokemons[0]['special_defense'] }}</b>
                                </p>
                            </div>
                        </div>
                        <br>
                        <div class="card" id="player-2-pokemon-2">
                            <div class="card-header">
                                <img src="{{ $player2Pokemons[1]['image_url'] }}" alt="{{ $player2Pokemons[1]['name'] }}"
                                    height="50" width="50">
                                <span>{{ strtoupper($player2Pokemons[1]['name']) }}</span>
                            </div>
                            <div class="card-body">
                                <p class="pokemon-attribute">Level: <strong>{{ $player2Pokemons[1]['level'] }}</strong>
                                </p>

                                <p class="pokemon-attribute">Energy:
                                    <strong>{{ \App\Models\Energy::find($player2Pokemons[1]['energy_id'])->name }}</strong>
                                </p>
                                <p class="pokemon-attribute">HP: <b>{{ $player2Pokemons[1]['max_health_points'] }}</b>
                                </p>
                                <p class="pokemon-attribute">Attack: <b>{{ $player2Pokemons[1]['normal_damage'] }}</b>
                                </p>
                                <p class="pokemon-attribute">Special Attack:
                                    <b>{{ $player2Pokemons[1]['special_damage'] }}</b>
                                </p>
                                <p class="pokemon-attribute">Special Defense:
                                    <b>{{ $player2Pokemons[1]['special_defense'] }}</b>
                                </p>
                            </div>
                        </div>
                        <br>
                        <div class="card" id="player-2-pokemon-3">
                            <div class="card-header">
                                <img src="{{ $player2Pokemons[2]['image_url'] }}"
                                    alt="{{ $player2Pokemons[2]['name'] }}" height="50" width="50">
                                <span>{{ strtoupper($player2Pokemons[2]['name']) }}</span>
                            </div>
                            <div class="card-body">
                                <p class="pokemon-attribute">Level:
                                    <strong>{{ $player2Pokemons[2]['level'] }}</strong>
                                </p>

                                <p class="pokemon-attribute">Energy:
                                    <strong>{{ \App\Models\Energy::find($player2Pokemons[2]['energy_id'])->name }}</strong>
                                </p>
                                <p class="pokemon-attribute">HP: <b>{{ $player2Pokemons[2]['max_health_points'] }}</b>
                                </p>
                                <p class="pokemon-attribute">Attack: <b>{{ $player2Pokemons[2]['normal_damage'] }}</b>
                                </p>
                                <p class="pokemon-attribute">Special Attack:
                                    <b>{{ $player2Pokemons[2]['special_damage'] }}</b>
                                </p>
                                <p class="pokemon-attribute">Special Defense:
                                    <b>{{ $player2Pokemons[2]['special_defense'] }}</b>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>


@endsection

@section('js')
    <script src="{{ asset('js/combat/auto-random.js') }}"></script>
@endsection
