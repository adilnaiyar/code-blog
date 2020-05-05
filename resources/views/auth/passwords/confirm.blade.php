@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-2">{{ __('Confirm Password') }}</h1>
                            </div>
                            {{ __('Please confirm your password before continuing.') }}
                            <form class="user" method="POST" action="{{ route('password.confirm') }}">
                                @csrf
                                <div class="form-group row">
                                    
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror form-control-user" name="password"  placeholder="Password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                {{ __('Confirm Password') }}
                                </button>
                            </form>
                            <hr>
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection