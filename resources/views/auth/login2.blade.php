@extends('user.app')
@section('content')
<section class="page-banner">
  <div class="container">
    <div class="page-banner-in">
      <div class="row">
        <div class="col-xl-6 col-lg-6 col-12">
          <h1 class="page-banner-title text-uppercase">Login Admin</h1>
        </div>
        <div class="col-xl-6 col-lg-6 col-12">
          <ul class="right-side">
            <li><a href="index.html">Home</a></li>
            <li>Login</li>
            <li>Admin</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>



<section class="login pt-100">
  <div class="container">
    <div class="billing-details">
      <h2 class="checkout-title text-uppercase text-center mb-30">ADMIN LOGIN</h2>
      <form class="checkout-form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
          <label class="form-label">Email address</label>
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          @error('password')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
        </div>
        <div class="form-group">
          <label class="form-label">Password</label>
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        </div>
        <div class="login-btn-g">
          <div class="row">
                <div class="col-12">
                    <button name="submit" type="submit" class="btn btn-color right-side">Log In</button>
                </div>
            </div>
            </div>
            <div class="text-center">
            </div>
            <div class="admin text-center mt-20" style="padding-bottom: 100px">
              <span>Please login Admin</span>
              </div>
      </form>
    </div>
  </div>
</section>
@endsection
