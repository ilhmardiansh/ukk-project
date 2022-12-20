@extends('user.app')
@section('content')

<section class="page-banner">
  <div class="container">
    <div class="page-banner-in">
      <div class="row">
        <div class="col-xl-6 col-lg-6 col-12">
          <h1 class="page-banner-title text-uppercase">REGISTER</h1>
        </div>
        <div class="col-xl-6 col-lg-6 col-12">
          <ul class="right-side">
            <li><a href="index.html">Home</a></li>
            <li>Register</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="login pt-100" style="padding-bottom: 100px">
  <div class="container">
    <div class="billing-details">
      <h2 class="checkout-title text-uppercase text-center mb-30">CREATE ACCOUNT</h2>
      <form class="checkout-form" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama">

          @error('name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror


        </div>
        <div class="form-group">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <div class="form-group">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

      @error('password')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
        </div>
        <div class="form-group">
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Password">
                  </div>
        <div class="mt-3">
          <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Daftar</button>
        </div>
        <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="{{route('login')}}" class="text-primary">Login</a>
        </div>
      </form>
      </form>
    </div>
  </div>
</section>

@endsection
