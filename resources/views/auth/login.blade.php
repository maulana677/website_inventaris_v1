{{--  @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection  --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('components.header')
</head>

<body class="bg-soft-blue">

    <div class="container">
        <div class="row align-items-center justify-content-center" style="min-height: 100vh">
            <div class="col-md-5">
                <div class="card border-0">
                    <div class="card-body">
                        <a href="." class="navbar-brand d-flex align-items-center gap-2 fw-bold mb-5">
                            <img src="{{ url('assets/images/logo.png') }}" alt="">
                            <div>
                                <p class="mb-0 fs-7" style="line-height: 15px;">
                                    Ware <br> <span class="text-primary">House</span>
                                </p>
                            </div>
                        </a>

                        <h5 class="text-dark fw-bold mb-4">Sign In</h5>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="mb-1">Alamat Email</label>
                                <input type="text" name="email" value="{{ old('email') }}"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Tulis alamat email kamu" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="mb-1">Password</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Masukkan password kamu">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button class="btn btn-primary d-block w-100 mb-3" type="submit">Sign In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.scripts')
</body>

</html>
