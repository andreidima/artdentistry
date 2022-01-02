@extends('layouts.app')

@section('content')
<div class="container" style="">
    <div class="row py-5 justify-content-center">
        {{-- <div class="col-md-3 position-absolute top-50 start-50 translate-middle"> --}}
        {{-- <div class="col-md-4 py-5 d-flex justify-content-center"> --}}
            <div class="card col-sm-7 col-lg-4 p-0" style="border:1px solid darkcyan">
                <div class="card-header text-white" style="background-color:darkcyan;">
                    <div class="row">
                        <div class="col-lg-12 text-center fs-5">
                            {{ config('app.name', 'Evidența persoanelor Focșani') }}
                        </div>
                        {{-- <div class="col-lg-12 text-center fs-5">
                            {{ __('auth.Login') }}
                        </div> --}}
                    </div>
                </div>

                <div class="card-body pb-0">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row">

                            <div class="col-md-12 mb-3">
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend2" style="color:white; background-color:darkcyan">
                                        <i class="fas fa-user" style="color:white; background-color:darkcyan"></i>
                                    </span>
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus
                                        placeholder="{{ __('auth.E-Mail Address') }}"
                                    >
                                </div>

                                @error('email')
                                    <span class="text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12 mb-3">
                                <div class="input-group">
                                        <span class="input-group-text" id="inputGroupPrepend2" style="color:white; background-color:darkcyan">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password"
                                        placeholder="{{ __('auth.Password') }}"
                                    >
                                </div>

                                @error('password')
                                    <span class="text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-12 text-center d-grid gap-2 mx-auto">

                                <div class="d-flex justify-content-center my-0">
                                    <div class="form-check d-inline-block">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('auth.Remember Me') }}
                                        </label>
                                    </div>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link p-0 m-0 border-0" href="{{ route('password.request') }}">
                                                {{ __('auth.Forgot Your Password?') }}
                                            </a>
                                        @endif
                                </div>

                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-7 d-grid gap-2 mx-auto">

                                <button type="submit" class="btn text-white mb-2 fs-5" style="background-color:#e66800">
                                    {{ __('auth.Login') }}
                                </button>

                            </div>
                        </div>

                        @if (Route::has('register'))
                            <div class="form-group row">
                                <div class="col-md-12 text-center">
                                    <hr>
                                    Nu ai cont?
                                    <a class="" href="{{ route('register') }}">Înregistrează-te</a>
                                </div>
                            </div>
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
