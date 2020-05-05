@extends('layouts.app')
@section('content')
<!-- Outer Row -->
<div class="row justify-content-center">
  <div class="col-xl-10 col-lg-12 col-md-9">
    <div class="card o-hidden border-0 shadow my-4">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-6 d-none d-lg-block">
            <img src="{{asset('images/man.jpg')}}" width="500" height="600" alt="photo" class="img-fluid">
          </div>
          <div class="col-lg-6">
            <div class="p-4">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
              </div>
              @include('includes.session_error')
              <form class="user" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                  
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror form-control-user" name="email" value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="Enter Email Address..." required autocomplete="email" autofocus>
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                  
                </div>
                <div class="form-group">
                  
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror form-control-user" name="password" placeholder="Password" required autocomplete="current-password">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                  
                </div>
                <div class="form-group">
                  
                  <div class=" custom-control custom-checkbox small">
                    <input class=" custom-control-input" type="checkbox" name="remember" id="customCheck" {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="customCheck">{{ __('Remember Me') }}</label>
                  </div>
                  
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                {{ __('Login') }}
                </button>
                <hr>
                <a href="login/github" class="btn btn-dark btn-user btn-block">
                  <span style="margin-right: 10px">
                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-614.000000, -553.000000)" fill="#FFFFFF" fill-rule="nonzero">
                          <g id="github" transform="translate(614.000000, 553.000000)">
                          <path d="M12,0.297 C5.37,0.297 0,5.67 0,12.297 C0,17.6 3.438,22.097 8.205,23.682 C8.805,23.795 9.025,23.424 9.025,23.105 C9.025,22.82 9.015,22.065 9.01,21.065 C5.672,21.789 4.968,19.455 4.968,19.455 C4.422,18.07 3.633,17.7 3.633,17.7 C2.546,16.956 3.717,16.971 3.717,16.971 C4.922,17.055 5.555,18.207 5.555,18.207 C6.625,20.042 8.364,19.512 9.05,19.205 C9.158,18.429 9.467,17.9 9.81,17.6 C7.145,17.3 4.344,16.268 4.344,11.67 C4.344,10.36 4.809,9.29 5.579,8.45 C5.444,8.147 5.039,6.927 5.684,5.274 C5.684,5.274 6.689,4.952 8.984,6.504 C9.944,6.237 10.964,6.105 11.984,6.099 C13.004,6.105 14.024,6.237 14.984,6.504 C17.264,4.952 18.269,5.274 18.269,5.274 C18.914,6.927 18.509,8.147 18.389,8.45 C19.154,9.29 19.619,10.36 19.619,11.67 C19.619,16.28 16.814,17.295 14.144,17.59 C14.564,17.95 14.954,18.686 14.954,19.81 C14.954,21.416 14.939,22.706 14.939,23.096 C14.939,23.411 15.149,23.786 15.764,23.666 C20.565,22.092 24,17.592 24,12.297 C24,5.67 18.627,0.297 12,0.297" id="Shape"></path>
                        </g>
                      </g>
                    </g>
                  </svg>
                </span>
                {{ __('Login with GitHub') }}
              </a>
            </form>
            <hr>
            <div class="text-center">
              @if (Route::has('password.request'))
              <a class="small" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
              </a>
              @endif
            </div>
            <div class="text-center">
              <a class="small" href="{{ route('register') }}">{{ __('Create an Account!') }}</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection