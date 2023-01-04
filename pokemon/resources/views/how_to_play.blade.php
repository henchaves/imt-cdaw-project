@extends('template')

@section('title', 'How to play')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/howtoplay.css') }}">
@endsection

@section('content')
    <header>
        <x-navbar />
    </header>

    <main class="container">
        <h3>How to play</h3>
        <h4>Here you can find the rules of the game</h4>
        <div class="row">
            <div class="col-12 col-md-12">
                <h5>1. Create your account</h5>
                <p>First of all, you need to create an account. You can do this by clicking on the "LOGIN OR REGISTER"
                    button in the navigation bar. Then you will be redirected to the login page. Fill in the form with your
                    email and click on the "NEXT" button. If you email is not registered yet, you will be asked to fill in
                    your username and password. If you already have an account, you will be asked to fill in your password.
                    After that, you will be redirected to the play page. You can logout at any time clicking on the Logout
                    link in the navigation bar.</p>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12">
                <h5>2. Play</h5>
                <p>On the play page, you can see your status such as level, number of victories and mastered energies. Once
                    you create your account, you gain three random energies. After winning a battle, you have a chance to
                    get another one (it's rare!). Also on this page, you can check your battle history. You can see the list
                    of your battles, the name of your opponents and the result of each one. You can also see the replays
                    clicking on the button of each row. To start a new battle, you must select the battle type and which
                    player do you want to challenge. After that, click on the Play button and pray to win!
                </p>
            </div>
        </div>
        {{-- TODO: ADD BATTLE INSTRUCTIONS --}}
    </main>
@endsection
