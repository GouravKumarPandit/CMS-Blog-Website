@extends('layouts.index')

@section('main')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card " style="background-color: rgba(225,226,220, 0.8);">
                <div class="card-header text-center fw-bold">{{ __('Login') }}</div>
                <div class="horizontal-line"></div>
                <div class="card-body">
                    @if(Session('error')) 
                    <p style="background: red; color:white;padding:1rem "> {{ Session('error') }} </p>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-12 col-form-label required-field fw-bold">{{ __('Email Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-12 col-form-label required-field fw-bold">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label fw-bold" for="remember">{{ __('Remember Me') }}</label>

                                    @if (Route::has('password.request'))
                                        <div class="d-inline-block float-end">
                                            <a class="btn btn-link fw-bold" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-12 text-center">
                                <button type="submit" class="button-29">
                                    {{ __('Login') }}
                                </button>
                            </div>

                            <div class="col-12 mt-3 text-center">
                                Don't have an account?<a href="{{route('register')}}" class="text-primary">Sign Up</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
