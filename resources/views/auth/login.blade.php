@extends('layouts.app')

@section('head')
    <title>{{ trans('auth.login') }} | {{ config('app.name', 'Laravel') }}</title>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@sequeloneinc">
    <meta name="twitter:creator" content="@sequeloneinc">
    <meta name="twitter:title" content="{{ trans('auth.login') }} | {{ config('app.name', 'Laravel') }}">
    <meta name="twitter:description" content="{{ trans('auth.login') }}}">
    <meta name="twitter:image" content="{{ asset('img/logo.png') }}">

    <!-- Facebook -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ trans('auth.login') }} | {{ config('app.name', 'Laravel') }}">
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
                <div class="card-header bg-primary text-white">{{ trans('auth.login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ trans('auth.email') }}</label>

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
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ trans('auth.password') }}</label>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text border-primary bg-primary text-white" id="email"><i class="fa-solid fa-unlock"></i></span>
                                    <input id="password" type="password" class="form-control border-primary @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    <button type="button" id="hide" class="btn btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('auth.showPassword') }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
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
                                        {{ trans('auth.rememberMe') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ trans('auth.login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ trans('auth.forgot') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <hr class="dropdown-divider border-primary">
                        <p class="text-center">or</p>
                        <div class="row">
                            <div class="col-12 text-center">
                                <a href="{{ route('social.redirect','vkontakte') }}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('auth.vk') }}"><i class="fa-brands fa-vk"></i></a>
                                <a href="{{ route('social.redirect','facebook') }}" class="btn btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('auth.facebook') }}"><i class="fa-brands fa-facebook"></i></a>
                                <a href="{{ route('social.redirect','github') }}" class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('auth.github') }}"><i class="fa-brands fa-github"></i></a>
                                <a href="{{ route('social.redirect','google') }}" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('auth.google') }}"><i class="fa-brands fa-google"></i></a>
                                <a href="{{ route('social.redirect','twitter') }}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('auth.twitter') }}"><i class="fa-brands fa-twitter"></i></a>
                                <a href="{{ route('social.redirect','yandex') }}" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('auth.yandex') }}"><i class="fa-brands fa-yandex"></i></a>
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
        let password = document.getElementById("password");
        
        document.getElementById("hide").addEventListener("click", function(e){
            if(password.getAttribute("type") === "password"){
                password.setAttribute("type", "text");
            } else {
                password.setAttribute("type", "password");
            }

            $(this)
                .find('[data-fa-i2svg]')
                .toggleClass('fa-eye')
                .toggleClass('fa-eye-slash');
        });

        var tooltipTriggerList = [].slice.call(
            document.querySelectorAll('[data-bs-toggle="tooltip"]')
        );
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
@endsection
