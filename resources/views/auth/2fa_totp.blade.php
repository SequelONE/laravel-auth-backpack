@extends('layouts.app')

@section('head')
    <title>{{ __('2FA Time-based One Time Password') }} | {{ config('app.name', 'Laravel') }}</title>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@sequeloneinc">
    <meta name="twitter:creator" content="@sequeloneinc">
    <meta name="twitter:title" content="{{ __('2FA Time-based One Time Password') }} | {{ config('app.name', 'Laravel') }}">
    <meta name="twitter:description" content="{{ __('2FA Time-based One Time Password') }}">
    <meta name="twitter:image" content="{{ asset('img/logo.png') }}">

    <!-- Facebook -->
    <meta property="og:url" content="https://getbootstrap.com/docs/4.2/examples/">
    <meta property="og:title" content="{{ __('2FA Time-based One Time Password') }} | {{ config('app.name', 'Laravel') }}">
    <meta property="og:description" name="description" content="{{ __('2FA Time-based One Time Password') }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('img/logo.png') }}">
    <meta property="og:image:secure_url" content="{{ asset('img/logo.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
			<div class="col-md-8">
                <div class="card">
                    <div class="card-header">Two-factor authentication</div>
                    <div class="card-body">

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                            <p>Enter the one-time password that you received when you enable two-factor authentication:</p>
                        <form class="form-horizontal" action="{{ route('totp2fa') }}" method="POST">
                            {{ csrf_field() }}
							<div class="otp">
								<div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
									<label for="code" class="control-label">One-time password</label>
									<input id="code" name="code" class="form-control col-md-4"  type="password"/>
								</div>
							</div>
                            <button class="btn btn-primary" type="submit">Authenticate</button>
							<a class="btn" href="/user/2fa">One Time Passwort</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
