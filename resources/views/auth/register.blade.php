@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="recaptcha" class="col-md-4 col-form-label text-md-end">{{ __('ReCaptcha') }}</label>

                            <div class="col-md-6">
                                {!! htmlFormSnippet() !!}
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                        <h5 class="text-center">Or</h5>

                        <div class="row mt-3">
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
    {!! ReCaptcha::htmlScriptTagJsApi() !!}

    <script>
        var tooltipTriggerList = [].slice.call(
            document.querySelectorAll('[data-bs-toggle="tooltip"]')
        );
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
@endsection
