@extends('layouts.app')

@section('head')
    <title>{{ __('Login') }} | {{ config('app.name', 'Laravel') }}</title>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@sequeloneinc">
    <meta name="twitter:creator" content="@sequeloneinc">
    <meta name="twitter:title" content="{{ __('Login') }} | {{ config('app.name', 'Laravel') }}">
    <meta name="twitter:description" content="{{ __('Login') }}">
    <meta name="twitter:image" content="{{ asset('img/logo.png') }}">

    <!-- Facebook -->
    <meta property="og:url" content="https://getbootstrap.com/docs/4.2/examples/">
    <meta property="og:title" content="{{ __('Login') }} | {{ config('app.name', 'Laravel') }}">
    <meta property="og:description" name="description" content="{{ __('Login') }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('img/logo.png') }}">
    <meta property="og:image:secure_url" content="{{ asset('img/logo.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text border-primary bg-primary text-white" id="email"><i class="fa-solid fa-at"></i></span>
                                    <input id="email" type="email" class="form-control border-primary @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>

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
                                <div class="input-group mb-3">
                                    <span class="input-group-text border-primary bg-primary text-white" id="email"><i class="fa-solid fa-unlock"></i></span>
                                    <input id="password" type="password" class="form-control border-primary @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                </div>

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
                                    <input class="form-check-input border-primary" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

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
                        <hr class="dropdown-divider border-primary">
                        <p class="text-center">or</p>
                        <div class="row">
                            <div class="col-12 text-center">
                                <a href="{{ route('social.redirect','vkontakte') }}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Login with VK"><i class="fa-brands fa-vk"></i></a>
                                <a href="{{ route('social.redirect','facebook') }}" class="btn btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Login with Facebook"><i class="fa-brands fa-facebook"></i></a>
                                <a href="{{ route('social.redirect','github') }}" class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Login with Github"><i class="fa-brands fa-github"></i></a>
                                <a href="{{ route('social.redirect','google') }}" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Login with Google"><i class="fa-brands fa-google"></i></a>
                                <a href="{{ route('social.redirect','twitter') }}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Login with Twitter"><i class="fa-brands fa-twitter"></i></a>
                                <a href="{{ route('social.redirect','yandex') }}" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Login with Yandex"><i class="fa-brands fa-yandex"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascripts')
    <script>
        var tooltipTriggerList = [].slice.call(
            document.querySelectorAll('[data-bs-toggle="tooltip"]')
        );
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
@endsection
