@extends('template')

@section('title', 'Home')

@section('css')
<!-- <link rel="stylesheet" href="{{asset('css/home.css')}}"> -->
@endsection

@section('content')
<header>
    <x-navbar />
</header>


<main>
    <x-carousel />
</main>
@endsection

@section('js')
<script src="{{asset('js/home.js')}}"></script>
@endsection