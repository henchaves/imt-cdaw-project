@extends('template')

@section('title', 'Players')

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="{{ asset('css/players.css') }}">
@endsection

@section('content')
    <header>
        <x-navbar />
    </header>


    <main class="container">
        <div>
            <h3 class="text-center">Leaderboard (List of Players)</h3>
            <p class="text-center">Check out the table below to see the top players.</p>

            <table class="table table-striped" id="playersTable">
                <thead>
                    <tr>
                        <th hidden>ID</th>
                        <th class="align-middle">Username</th>
                        <th class="align-middle">Victories</th>
                        <th class="align-middle">Win Rate (%)</th>
                        <th class="align-middle">Level</th>
                        <th class="align-middle">Mastered Energies</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($players as $player)
                        <tr>
                            <td hidden>{{ $player->id }}</td>
                            <td class="align-middle">{{ $player->name }}</td>
                            @php
                                $defeats = count($player->combat_loses);
                                $victories = count($player->combat_wins);
                                if ($victories == 0 && $defeats == 0) {
                                    $winRate = 0;
                                } else {
                                    $winRate = ($victories / ($victories + $defeats)) * 100;
                                }
                                $winRate = round($winRate, 2);
                                $energyIds = array_unique($player->energies->pluck('energy_id')->toArray());
                                $energyNames = [];
                                foreach ($energyIds as $energyId) {
                                    $energyNames[] = \App\Models\Energy::find($energyId)->name;
                                }
                                $energyNames = implode(', ', $energyNames);
                            @endphp
                            <td class="align-middle">{{ $player->victories() }}</td>
                            <td class="align-middle">{{ $winRate }}</td>
                            <td class="align-middle">{{ $player->level() }}</td>
                            <td class="align-middle">{{ $energyNames }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </main>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script src="{{ asset('/js/playersDataTable.js') }}"></script>
@endsection
