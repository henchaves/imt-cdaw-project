@extends('template')

@section('title', 'Log In')

@section('css')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

@section('content')
<header>
  <x-navbar />
</header>

<main class="container">
  <h3 class="text-center">Connect to an account</h3>
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      <div class="card border-0 shadow rounded-3 my-5">
        <div class="card-body p-4 p-sm-5">
          <h5 id="form-message" class="card-title text-center mb-5 fw-light fs-5">Insert your email to proceed</h5>
          <form>
            <div class="form-floating mb-3">
              <input id="email-input" type="email" class="form-control">
              <label for="email-input">Email address</label>
            </div>
            <div class="form-floating mb-3" hidden>
              <input id="username-input" type="text" class="form-control">
              <label for="username-input">Username</label>
            </div>
            <div class="form-floating mb-3" hidden>
              <input id="password-input" type="password" class="form-control">
              <label for="password-input">Password</label>
            </div>
            <div class="d-grid">
              <button id="form-button" class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" data-behaviour="check-email">next</button>
            </div>
            <div class="alert alert-danger" role="alert" id="error-message" hidden>
              <p id="error-message-text"></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
  @endsection

  @section('js')
  <script src="{{asset('js/login.js')}}"></script>
  @endsection